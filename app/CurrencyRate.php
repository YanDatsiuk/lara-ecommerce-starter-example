<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyRate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currency_rate';

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /*
     * Calculating prices, depend on currency rates
     */
    public static function calcPrices($currency, $price){

        $prices = array();

        //todo check order
        $currencyRate = CurrencyRate::orderBy('created_at', 'desc')->first();

        $usdRate = $currencyRate->$currency / $currencyRate->usd;
        $uahRate = $currencyRate->$currency / $currencyRate->uah;
        $eurRate = $currencyRate->$currency / $currencyRate->eur;

        $prices['usd'] = $price * $usdRate;
        $prices['uah'] = $price * $uahRate;
        $prices['eur'] = $price * $eurRate;

        return $prices;
    }
}
