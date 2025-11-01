<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;

class CommentRoutesTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function guest_cannot_post_comment()
    {
        $response = $this->post('/commentaires', ['comment' => 'Hello']);
        $response->assertRedirect('/login'); // redirige les invités
    }

    #[Test]
    public function authenticated_user_can_post_comment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/commentaires', ['comment' => 'Hello']);
        $response->assertStatus(302); // redirect après post
    }
}
