<?php

namespace Tests\Unit;

use App\Models\Option;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test updating an option.
     *
     * @return void
     */
    public function testUpdateOption()
    {
        // Create an option
        $option = Option::create([
            'name' => 'Option Name',
            'description' => 'Option Description',
            'price' => 10.00,
        ]);

        // Update the option
        $response = $this->put(route('admin.options.update', $option->id), [
            'name' => 'Updated Option Name',
            'description' => 'Updated Option Description',
            'price' => 20.00,
        ]);

        // Check if the option was updated in the database
        $this->assertDatabaseHas('options', [
            'id' => $option->id,
            'name' => 'Updated Option Name',
            'description' => 'Updated Option Description',
            'price' => 20.00,
        ]);

        // Check if the response is successful
        $response->assertStatus(302); // Assuming the update redirects to another page
    }

    /**
     * Test deleting an option.
     *
     * @return void
     */
    public function testDeleteOption()
    {
        // Create an option
        $option = Option::create([
            'name' => 'Option Name',
            'description' => 'Option Description',
            'price' => 10.00,
        ]);

        // Delete the option
        $response = $this->delete(route('admin.options.destroy', $option->id));

        // Check if the option was deleted from the database
        $this->assertDatabaseMissing('options', [
            'id' => $option->id,
        ]);

        // Check if the response is successful
        $response->assertStatus(302); // Assuming the deletion redirects to another page
    }
}
