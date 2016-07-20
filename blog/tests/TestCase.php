<?php

<<<<<<< HEAD
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
=======
class TestCase extends Illuminate\Foundation\Testing\TestCase
>>>>>>> 1c7c8fb3f1680cb7f0e94d5085418444e759bf65
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
