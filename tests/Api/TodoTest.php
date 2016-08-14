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

    /** @test */
    public function del_todo(){
        $todo = factory(Todo::class)->create();

        $this->delete("todos/{$todo->id}");

        $this->assertResponseStatus(204);
        $this->notSeeInDatabase('todos', [
            'title' => $todo->title
        ]);

    }

    /** @test */
    public function update_todo(){
        $todo_one = factory(Todo::class)->create();
        $todo_two = factory(Todo::class)->make();
        $data = [
            'title' => $todo_two->title
        ];

        $this->put("todos/{$todo_one->id}", $data);

        $this->assertResponseStatus(204);
        $this->seeInDatabase('todos', [
            'title' => $todo_two->title
        ]);
    }

    public function add_todo(){
        $todo = factory(Todo::class)->make();

        $data = [
            'title' => $todo->title
        ];

        $this->seeInDatabase('todos', [
            'title' => $todo->title
        ]);
    }

}
