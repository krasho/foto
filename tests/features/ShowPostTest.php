<?php
class ShowPostTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_detail()
    {
        //Having
        $user = $this->defaultUser([
            'name' => 'Jose Luis'
        ]);

        $post = $this->createPost([
            'title' => 'Como instalar Laravel',
            'content'=> 'Este es el contenido del post',
            'user_id' => $user->id,
        ]);


        $user->posts()->save($post);


        //When
        $this->visit($post->url)
              ->seeInElement('h1', $post->title)
              ->see($post->content)
              ->see('Jose Luis');

    }

    function test_old_urls_are_redirected()
    {
        //Having
        $post = $this->createPost([
            'title' => 'Old Title',
        ]);


        $url = $post->url;

        $post->update(['title'=>'new title']);

        $this->visit($url)
             ->seePageIs($post->url);

    }
}
