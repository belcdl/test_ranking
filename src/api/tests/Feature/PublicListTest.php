<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PublicListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function test_list_ads_ok()
    {
        $this->json('get', 'api/ads/irrelevant')
        ->assertStatus(Response::HTTP_OK);
    }
}
