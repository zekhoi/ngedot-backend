<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Province;
use App\Models\City;
use App\Models\User;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_search_all_provinces_as_user(): void
    {
        $user = User::factory()->create();
        
        $provinces = Province::all();
        
        $this->actingAs($user);
        $response = $this->get('/search/provinces');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $provinces->toArray(),
        ]);

        $user->delete();
    }

    public function test_api_search_provinces_by_id_as_user(): void
    {
        $user = User::factory()->create();

        $province = Province::first();

        $this->actingAs($user);
        $response = $this->get('/search/provinces?id=' . $province->id);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $province->toArray(),
        ]);

        $user->delete();
    }

    public function test_api_search_all_cities_as_user(): void
    {
        $user = User::factory()->create();

        $cities = City::all();

        $this->actingAs($user);
        $response = $this->get('/search/cities');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $cities->toArray(),
        ]);

        $user->delete();
    }

    public function test_api_search_cities_by_id_as_user(): void
    {
        $user = User::factory()->create();

        $city = City::first();

        $this->actingAs($user);
        $response = $this->get('/search/cities?id=' . $city->id);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $city->toArray(),
        ]);

        $user->delete();
    }
}
