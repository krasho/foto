<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{

    public function test_a_slug_in_generated_and_saved_to_the_database()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'como instalar Laravel',
        ]);

        $user->posts()->save($post);

        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
