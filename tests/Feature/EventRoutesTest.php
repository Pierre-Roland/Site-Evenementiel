<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class EventRoutesTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_returns_next_events()
    {
        // créer des événements pour test
        Event::factory()->create(['title' => 'Tomorrowland', 'date' => Carbon::tomorrow()]);
        Event::factory()->create(['title' => 'Past Event', 'date' => Carbon::yesterday()]);

        $response = $this->get('/events/getNextEvents');

        $response->assertStatus(200);
        $response->assertSee('Tomorrowland');
        $response->assertDontSee('Past Event');
    }

    #[Test]
    public function it_returns_most_popular_events()
    {
        Event::factory()->create(['title' => 'Popular Event', 'rate' => 5]);
        $response = $this->get('/events/getMostPopular');

        $response->assertStatus(200);
        $response->assertSee('Popular Event');
    }
}

