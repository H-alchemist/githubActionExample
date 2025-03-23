<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_new_post()
{
    $response = $this->post('/posts', [
        'title' => 'Test Post',
        'description' => 'This is a test description.',
    ]);

    dump($response->status()); 
    dump($response->json());  

    $response->assertStatus(201);
    $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
}

    public function test_index_returns_all_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_getOne_returns_specific_post()
    {
        $post = Post::factory()->create([
            'title' => 'Specific Post',
            'description' => 'This is a specific description.',
        ]);

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'title' => 'Specific Post',
            'description' => 'This is a specific description.',
        ]);
    }
}
