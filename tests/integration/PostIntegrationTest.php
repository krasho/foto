<?php

class PostIntegrationTest extends TestCase
{

    public function test_a_slug_in_generated_and_saved_to_the_database()
    {

        $post = $this->createPost([
            'title' => 'como instalar Laravel',
        ]);


        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
