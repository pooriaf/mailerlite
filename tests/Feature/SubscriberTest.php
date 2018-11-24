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

    public function testCanSubscribeWithCustomFields()
    {
        $subscriber = factory(Subscriber::class)->state('new_subscriber')->make();
        $fields = factory(Field::class, 3)->create();
        foreach ($fields as $field) {
            $subscriber->{$field->title} = FieldFakerHelper::getTitle($this->faker, $field->type);
        }
        $response = $this->json('POST', route('subscribers.store'), $subscriber->toArray());
        $response->assertStatus(201);
        $response->assertJson([
            'data' => true
        ]);
    }

    public function testCanUpdateSubscriberWithCustomFields()
    {
        $subscriber = factory(Subscriber::class)->state('new_subscriber')->create();

        $payload = [
            'state' => $this->faker->randomElement(Subscriber::STATE)
        ];
        $fields = factory(Field::class, 2)->create();
        foreach ($fields as $field) {
            $payload[$field->title] = FieldFakerHelper::getTitle($this->faker, $field->type);
        }

        $response = $this->json('PATCH', route('subscribers.update', $subscriber->id), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => true
        ]);
    }

    public function testCanRemoveSubscriber()
    {
        $subscriber = factory(Subscriber::class)->state('random_subscriber')->create();
        $response = $this->json('DELETE', route('subscribers.destroy', $subscriber->id), $subscriber->toArray());
        $response->assertStatus(200);
    }
}
