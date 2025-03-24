<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutControllerTest extends TestCase
{
   
    public function test_about_page_returns_correct_response()
    {
        
        $response = $this->get('/about');

        $response->assertStatus(200);

        $response->assertSee('from about');
    }
}
