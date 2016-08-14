<?php

namespace Someline\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\TodoRepository;
use Someline\Models\Todo;
use Someline\Validators\TodoValidator;

/**
 * Class TodoRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class TodoRepositoryEloquent extends BaseRepository implements TodoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Todo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}