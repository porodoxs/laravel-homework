<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $statuses = [0=>'Новый',10=>'Подтвержден',20=>'Завершен'];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');
    }

    /**
     * Статус заказа.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }

    /**
     * Сумма заказа.
     */
    public function getOrderPrice()
    {
        return $this->products()->sum(DB::raw('order_products.quantity * order_products.price'));
    }
}
