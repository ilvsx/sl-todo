<?php

namespace Someline\Api\Controllers;

use Illuminate\Http\Request;
use Someline\Models\Foundation\Todo;
use Someline\Repositories\Interfaces\TodoRepository;
use Someline\Transformers\TodoTransformer;

class TodoController extends BaseController
{

    /**
     * @var TodoRepository
     */
    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function _list(){
        $todos = $this->todoRepository->all();

        return $this->response->collection($todos, new TodoTransformer());
    }

    public function delete($todo_id){
        $this->todoRepository->delete($todo_id);

        return $this->response->noContent();
    }

    public function update($todo_id, Request $request){
        $this->todoRepository->update(['title' => $request->title], $todo_id);

        return $this->response->noContent();
    }

    public function store(Request $request){
        $this->todoRepository->create([
            'title' => $request->title
        ]);

        return $this->response->created();
    }

}