<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Todo;
use Someline\Models\Foundation\User;

/**
 * Class UserTransformer
 * @package namespace Someline\Transformers;
 */
class TodoTransformer extends BaseTransformer
{

    /**
     * Transform the User entity
     * @param Todo $model
     *
     * @return array
     */
    public function transform(Todo $model)
    {
        return [
            'id' => (int)$model->id,
            'title' => (string)$model->title,
            'is_done' => (int)$model->is_done,

            'created_at' => (string)$model->created_at,
            'updated_at' => (string)$model->updated_at
        ];
    }
}
