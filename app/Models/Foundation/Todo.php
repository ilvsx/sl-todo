<?php

namespace Someline\Models\Foundation;

use Someline\Models\BaseModel;

/**
 * @property string title
 * @property int id
 * @property string created_at
 * @property string updated_at
 * @property int is_done
 */
class Todo extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'is_done'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
