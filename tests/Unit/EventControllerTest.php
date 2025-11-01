<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\EventController;
use Carbon\Carbon;
use PHPUnit\Framework\Attributes\Test;

class EventControllerTest extends TestCase
{
    use RefreshDatabase; // vide la base avant chaque test

    #[Test]
    public function it_returns_upcoming_events()
    {
        Event::factory()->create(['title' => 'Past Event', 'date' => Carbon::yesterday()]);
        $futureEvent = Event::factory()->create(['title' => 'Tomorrowland', 'date' => Carbon::tomorrow()]);

        $controller = new EventController();
        $result = $controller->getNextEvents();

        $this->assertCount(1, $result);
        $this->assertEquals('Tomorrowland', $result->first()->title);
    }

    #[Test]
    public function it_returns_most_popular_event()
    {
        $tomorrowlandEvent = Event::factory()->create(['rate' => 5, 'title' => "Tomorrowland"]);
        Event::factory()->create(['rate' => 4, 'title' => "Barbencon"]);
        Event::factory()->create(['rate' => 4, 'title' => "eventPlusBasRate"]);
    
        $controller = new EventController();
        $result  = $controller->getMostPopular();

        $this->assertCount(1, $result);
        $this->assertEquals('Tomorrowland', $result->first()->title);
    }
}
