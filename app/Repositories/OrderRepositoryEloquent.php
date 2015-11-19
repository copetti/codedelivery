<?php

namespace CodeDelivery\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function order($field){
        return $this->model->orderBy($field);
    }

    public function filterBy($status){
        return $this->model->where('status',$status);
    }

    public function getCountByStatus($status){
        return $this->model->where('status',$status)->count();
    }

    public function getByIdAndDeliveryman($id,$idDeliveryman){
        $result = $this->with(['client','items','cupom'])->findWhere([
            'id' => $id,
            'user_deliveryman_id' => $idDeliveryman
        ]);

        $result = $result->first();
        if($result) {
            $result->items->each(function ($item) {
                $item->product;
            });
        }

        return $result;
    }
}
