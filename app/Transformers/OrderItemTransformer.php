<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\OrderItem;
use League\Fractal\TransformerAbstract;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model) {
        return [
            'id'         => (int)$model->id,
            'product_id'         => (int)$model->product_id,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}