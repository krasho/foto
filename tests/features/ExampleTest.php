<?php
class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
    {
        $name = "Jose Luis";
        $user =  factory(\App\User::class)->create([
            'name' => $name,
            'email' => 'crasho1481@gmail.com'
        ]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see($name);
    }
}
