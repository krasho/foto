<?php
class WriteCommentTest extends FeatureTestCase
{
    public function test_a_user_can_write_a_comment()
    {
        $post = $this->createPost();

        $this->actingAs($this->defaultUser())
             ->visit($post->url)
             ->type('Un comentario', 'comment')
             ->press('Publicar Comentario');


        $this->seeInDatabase('comments', [
            'comment' => 'Un comentario',
            'user_id' => $this->defaultUser()->id,
            'post_id' => $post->id
        ]);

        $this->seePageIs($post->url);
    }
}
