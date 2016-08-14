<?php

include_once 'BaseApiTestCase.php';

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoTest extends BaseApiTestCase
{

    /** @test */
    public function get_todos(){

        $this->get('todos');
        $this->assertEquals('todos', $this->response->content());

    }

}
