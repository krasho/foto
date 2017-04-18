<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    protected $baseUrl = 'http://localhost';
    protected $defaultUser;

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function defaultUser()
    {
        if ($this->defaultUser) {
            return $this->defaultUser;
        }


        return $this->defaultUser = factory(\App\User::class)->create();
    }
}
