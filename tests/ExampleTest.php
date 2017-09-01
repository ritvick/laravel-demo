<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    
    public function testLogin() {
         $this->json('POST', '/api/login', ['email' => 'admin@test.com', "password" => "admin"])
             ->seeJson([
                 'valid' => true,
             ]);
    }
}
