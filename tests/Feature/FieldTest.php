<?php

namespace Tests\Feature;

use App\Models\Field;
use FieldsTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * Class FieldTest
 * @package Tests\Feature
 */
class FieldTest extends TestCase
{
    use WithFaker;

    /**
     * Try to list fields
     *
     * @return void
     */
    public function testCanListFields()
    {
        $this->seed(FieldsTableSeeder::class);
        $response = $this->json('GET', route('fields.index'));
        $response->assertStatus(200);
        $response->assertJson([
            'data' => true
        ]);
    }

    /**
     * Try to create a field
     *
     * @return void
     */
    public function testCanCreateField()
    {
        $field = factory(Field::class)->make();
        $response = $this->json('POST', route('fields.store'), $field->toArray());
        $response->assertStatus(201);
        $response->assertJson([
            'data' => true
        ]);
    }

    /**
     * Try to update a field
     *
     * @return void
     */
    public function testCanUpdateField()
    {
        $field = factory(Field::class)->create();

        $payload = [
          'type' => Field::TYPE['STRING'],
          'title' => $this->faker->sentence . ' Updated!'
        ];

        $response = $this->json('PATCH', route('fields.update', $field->id), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => true
        ]);
    }

    /**
     * Try to remove field
     *
     * @return void
     */
    public function testCanRemoveField()
    {
        $field = factory(Field::class)->create();
        $response = $this->json('DELETE', route('fields.destroy', $field->id));
        $response->assertStatus(200);
    }
}
