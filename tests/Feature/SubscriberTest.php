<?php

namespace Tests\Feature;

use App\Helpers\Fakers\FieldFakerHelper;
use App\Models\Field;
use App\Models\Subscriber;
use SubscribersTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SubscriberTest extends TestCase
{
    use WithFaker;

    /**
     * Get List of the subscribers.
     *
     * @return void
     */
    public function testCanListSubscribers()
    {
        $this->seed(SubscribersTableSeeder::class);
        $response = $this->json('GET', route('subscribers.index'));
        $response->assertStatus(200);
        $response->assertJson([
            'data' => true
        ]);
    }

    /**
     * Trying to subscribe a user
     *
     * @return void
     */
    public function testCanSubscribe()
    {
        $subscriber = factory(Subscriber::class)->state('new_subscriber')->make();
        $response = $this->json('POST', route('subscribers.store'), $subscriber->toArray());
        $response->assertStatus(201);
        $response->assertJson([
            'data' => true
        ]);
    }
}
