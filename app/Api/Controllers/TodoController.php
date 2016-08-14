<?php

namespace Someline\Api\Controllers;

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
        $todo = $this->todoRepository->delete($todo_id);

        return $this->response->noContent();
    }

}