<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\Cupom;
use League\Fractal\TransformerAbstract;

/**
 * Class CupomTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CupomTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cupom entity
     * @param \Cupom $model
     *
     * @return array
     */
    public function transform(Cupom $model) {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}