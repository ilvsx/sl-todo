<?php

include_once 'BaseApiTestCase.php';

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Someline\Models\Foundation\Todo;

class TodoTest extends BaseApiTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function get_todos(){
        $todos = factory(Todo::class, 3)->create();

        $this->get('todos');
        $todos->map(function(Todo $todo){
            $this->seeJson([
                'title' => $todo->title
            ]);
        });
    }

}
