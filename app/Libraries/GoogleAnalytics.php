<?php 
namespace App\Libraries;

use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class GoogleAnalytics{

    static function fetchEcommerceConversionRate(Period $period)
    {

        $response = Analytics::performQuery(
            $period,
            'ga:transactionsPerSession'
        );

        $result= collect($conversion_rate['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'transactionsPerSession' =>  $dateRow[0]
            ];
        });

        return $result;
    }

    static function fetchBounceRate(Period $period)
    {
        $response =Analytics::performQuery(
            $period,
            'ga:bounceRate' 
        );

        $result= collect($conversion_rate['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'bounceRate' =>  $dateRow[0]
            ];
        });

    } 

    static function fetchTotalValue(Period $period)
    {

        $response = Analytics::performQuery(
            $period,
            'ga:totalValue'
        );

        $result= collect($conversion_rate['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'totalValue' =>  $dateRow[0]
            ];
        });

        return $result;
    }

}