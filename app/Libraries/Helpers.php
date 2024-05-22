<?php

namespace App\Libraries;

use App\Models\CurrencyData;
use Illuminate\Support\Facades\Http;

class Helpers
{


    public static function getExchangesXml()
    {
        //yesterday
        $date = date('d-m-Y', strtotime('-1 day'));

        $url = "https://evds2.tcmb.gov.tr/service/evds/series=TP.DK.USD.A-TP.DK.EUR.A-TP.DK.CHF.A-TP.DK.GBP.A-TP.DK.JPY.A-TP.DK.USD.S-TP.DK.EUR.S-TP.DK.CHF.S-TP.DK.GBP.S-TP.DK.JPY.S&startDate=$date&endDate=$date&type=xml";

        $headers = [
            'Content-Type' => 'application/xml',
            'key' => 'YeLvD6yoC7',
            'Accept' => '*/*',
        ];

        $response = Http::withHeaders($headers)->get($url);

        if ($response->failed()) {
            return null;
        }

        $xmlData = $response->body();

        // Parse XML data
        $xml = simplexml_load_string($xmlData);
        $exchangeData = (array) $xml->items;
        // Create ExchangeRate model instance and fill it with data
        $exchangeRate = new CurrencyData();
        $exchangeRate->fill($exchangeData);

        return $exchangeRate;
    }

    public static function getExchangesJson()
    {

        $date = date('d-m-Y', strtotime('-1 year'));
        $url = "https://evds2.tcmb.gov.tr/service/evds/series=TP.DK.USD.A-TP.DK.USD.S&startDate=$date&endDate=$date&type=json";

        $headers = [
            'Content-Type' => 'application/json',
            'key' => 'YeLvD6yoC7',
            'Accept' => '*/*',
        ];

        $response = Http::withHeaders($headers)->get($url);

        if ($response->failed()) {
            return null;
        }

        $jsonData = $response->body();

        // Parse JSON data
        $data = json_decode($jsonData, true);

        return $data;
    }
}
