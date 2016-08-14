<?php

namespace Someline\Api\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Someline\Repositories\Interfaces\TodoRepository;
use Someline\Transformers\TodoTransformer;
use Someline\Validators\TodoValidator;

class TodoController extends BaseController
{

    /**
     * @var TodoRepository
     */
    private $todoRepository;
    /**
     * @var TodoValidator
     */
    private $validator;

    public function __construct(TodoRepository $todoRepository, TodoValidator $validator)
    {
        $this->todoRepository = $todoRepository;
        $this->validator = $validator;
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
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        $this->todoRepository->update(['title' => $request->title], $todo_id);

        return $this->response->noContent();
    }

    public function store(Request $request){
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

        $todo = $this->todoRepository->create([
            'title' => $request->title
        ]);

        return $this->response->item($todo, new TodoTransformer());
    }

}