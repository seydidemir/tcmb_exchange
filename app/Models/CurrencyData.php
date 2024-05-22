<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyData extends Model
{
    protected $fillable = [
        'Tarih',
        'TP_DK_USD_A',
        'TP_DK_EUR_A',
        'TP_DK_CHF_A',
        'TP_DK_GBP_A',
        'TP_DK_JPY_A',
        'TP_DK_USD_S',
        'TP_DK_EUR_S',
        'TP_DK_CHF_S',
        'TP_DK_GBP_S',
        'TP_DK_JPY_S',
        'UNIXTIME',
    ];

    protected $casts = [
        'UNIXTIME' => 'array', // Gerekirse UNIXTIME'ı diziye dönüştürmek için
    ];
}
