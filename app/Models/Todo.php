<?php

namespace Someline\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Todo extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
