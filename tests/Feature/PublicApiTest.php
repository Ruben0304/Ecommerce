<?php


namespace Tests\Feature;

use Tests\TestCase;

class PublicApiTest extends TestCase
{


    /** @test */
    public function products_index_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/products');
        $response->assertStatus(200);
    }

    /** @test */
    public function products_show_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/products/1');
        $response->assertStatus(200);
    }

    /** @test */
    public function categories_index_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/categories');
        $response->assertStatus(200);
    }

    /** @test */
    public function categories_show_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/categories/1');
        $response->assertStatus(200);
    }
}
