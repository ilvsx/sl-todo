<?php

namespace Someline\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TodoValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|string',
        ],
   ];

}