<?php

namespace App\Http\Controllers;

use App\Libraries\Helpers;
use App\Models\CurrencyData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getExchangesXml()
    {
        $data = Helpers::getExchangesXml();
        $jsondata = Helpers::getExchangesJson();

        if ($data === null) {
            return redirect()->back()->with('error', 'XML verisi alınamadı.');
        }
        $arr = $jsondata['items'][0];

        $convertedXml = $this->convertData($data->toArray());
        $convertedJson =
        $this->convertJsonData($arr);

        return view('home.home')->with(compact('convertedXml', 'convertedJson'));
    }

    private function convertData($data)
    {
        return [
            'Dolar' => [
                'name' => 'Dolar',
                'buying' => $data['TP_DK_USD_A'],
                'selling' => $data['TP_DK_USD_S'],
                'flag' => 'usa.png',
            ],
            'Euro' => [
                'name' => 'Euro',
                'buying' => $data['TP_DK_EUR_A'],
                'selling' => $data['TP_DK_EUR_S'],
                'flag' => 'eu.png',
            ],
            'İsviçre Frangı' => [
                'name' => 'İsviçre Frangı',
                'buying' => $data['TP_DK_CHF_A'],
                'selling' => $data['TP_DK_CHF_S'],
                'flag' => 'sws.png',
            ],
            'İngiliz Sterlini' => [
                'name' => 'İngiliz Sterlini',
                'buying' => $data['TP_DK_GBP_A'],
                'selling' => $data['TP_DK_GBP_S'],
                'flag' => 'uk.png',
            ],
            'Japon Yeni' => [
                'name' => 'Japon Yeni',
                'buying' => $data['TP_DK_JPY_A'],
                'selling' => $data['TP_DK_JPY_S'],
                'flag' => 'jpn.png',
            ],
        ];
    }

    private function convertJsonData($arr)
    {
        return [
            'Dolar' => [
                'name' => 'Dolar',
                'buying' => $arr['TP_DK_USD_A'],
                'selling' => $arr['TP_DK_USD_S'],
                'flag' => 'usa.png',
            ],
        ];
    }


}
