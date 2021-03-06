<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function lists(){
        return $this->model->lists('name','id');
    }

    public function deliverymans(){
        return $this->model->where('role','=', 'deliveryman')->lists('name','id');
    }

    public function role($type){
        return $this->model->where('role','=',$type);
    }

    public function verifyUserEmail($email){
        return $this->model->where('email','=', $email)->count();
    }

    public function presenter()
    {
        return \CodeDelivery\Presenters\UserPresenter::class;
    }
}
