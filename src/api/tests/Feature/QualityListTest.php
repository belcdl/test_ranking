<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class QualityListTest extends TestCase
{
    /** @test */ 
    public function test_list_irrelevant_ok() {
        $this->json('get', 'api/ads/irrelevant')
        ->assertStatus(Response::HTTP_OK);
        
    }
}
