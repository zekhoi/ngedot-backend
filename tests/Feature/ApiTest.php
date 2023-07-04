<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Province;
use App\Models\City;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_search_all_provinces(): void
    {
        $provinces = Province::all();
        $response = $this->get('/search/provinces');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $provinces->toArray(),
        ]);
    }

    public function test_api_search_provinces_by_id(): void
    {
        $province = Province::first();
        $response = $this->get('/search/provinces?id=' . $province->id);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $province->toArray(),
        ]);
    }

    public function test_api_search_all_cities(): void
    {
        $cities = City::all();
        $response = $this->get('/search/cities');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $cities->toArray(),
        ]);
    }

    public function test_api_search_cities_by_id(): void
    {
        $city = City::first();
        $response = $this->get('/search/cities?id=' . $city->id);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $city->toArray(),
        ]);
    }
}
