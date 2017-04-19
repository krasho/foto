<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Post;

class ShowPostTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_detail()
    {
        //Having
        $user = $this->defaultUser([
            'name' => 'Jose Luis'
        ]);

        $post = factory(Post::class)->make([
            'title' => 'Como instalar Laravel',
            'content'=> 'Este es el contenido del post'
        ]);


        $user->posts()->save($post);


        //When
        $this->visit($post->url)
              ->seeInElement('h1', $post->title)
              ->see($post->content)
              ->see($post->name);

    }

    function test_old_urls_are_redirected()
    {
        //Having
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'Old Title',
        ]);


        $user->posts()->save($post);

        $url = $post->url;

        $post->update(['title'=>'new title']);

        $this->visit($url)
             ->seePageIs($post->url);

    }
}
