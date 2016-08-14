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
            'title' => (string)$model->title,

            'created_at' => (string)$model->created_at,
            'updated_at' => (string)$model->updated_at
        ];
    }
}
