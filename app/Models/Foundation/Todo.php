<?php

namespace Someline\Models\Foundation;

use Someline\Models\BaseModel;

/**
 * @property string title
 * @property int id
 */
class Todo extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
