<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Analytics\Period;

use Analytics;

use View;

use Lava;

use App\Libraries\GoogleAnalytics;


class GADataStatistics extends Controller
{

    public function index(){
        $page_visits  = Analytics::fetchVisitorsAndPageViews(Period::days(15));

        if(count($page_visits) == 0 ){
            $page_visits_graph = Lava::DataTable();
            $page_visits_graph->addNumberColumn('Days')
                       ->addNumberColumn('Number of Visits')
                       ->addRow(['15', 0])
                       ;   
            Lava::AreaChart('page_visits_graph', $page_visits_graph, [
                'title' => 'Session 15 Days',
                'legend' => [
                    'position' => 'in'
                ]
            ]);
        }else{
            /*
            statements for if array : page_visits will contain some records 
            Right now GA's dummy view_id returning null records so unable to understand the array 
            and result set so this condition is blank for now 
            */
        }
        


        $coversion_rate = GoogleAnalytics::fetchEcommerceConversionRate(Period::days(15)); 
        if(count($coversion_rate) == 0 ){
            $coversion_rate_graph = Lava::DataTable();
            $coversion_rate_graph->addNumberColumn('Days')
                       ->addNumberColumn('Number of Conversion Rate')
                       ->addRow(['15', 0])
                       ;   
            Lava::BarChart('coversion_rate_graph', $coversion_rate_graph, [
                'title' => 'Conversion Rate 15 Days',
                'legend' => [
                    'position' => 'in'
                ]
            ]);
        }else{
            /*
            statements for if array : page_visits will contain some records 
            Right now GA's dummy view_id returning null records so unable to understand the array 
            and result set so this condition is blank for now 
            */
        }



        $bounce_rate    = GoogleAnalytics::fetchBounceRate(Period::days(15));

        if(count($bounce_rate) == 0 ){
            $bounce_rate_graph = Lava::DataTable();
            $bounce_rate_graph->addNumberColumn('Days')
                       ->addNumberColumn('Number of Bounce Rate')
                       ->addRow(['15', 0])
                       ;   
            Lava::AreaChart('bounce_rate_graph', $bounce_rate_graph, [
                'title' => 'Bounce Rate 15 Days',
                'legend' => [
                    'position' => 'in'
                ]
            ]);
        }else{
            /*
            statements for if array : page_visits will contain some records 
            Right now GA's dummy view_id returning null records so unable to understand the array 
            and result set so this condition is blank for now 
            */
        }

        $total_value    = GoogleAnalytics::fetchTotalValue(Period::days(15));

        if(count($total_value) == 0 ){
            $total_value_graph = Lava::DataTable();
            $total_value_graph->addNumberColumn('Days')
                       ->addNumberColumn('Number of Total Value')
                       ->addRow(['15', 0])
                       ;   
            Lava::BarChart('total_value_graph', $total_value_graph, [
                'title' => 'Total Value 15 Days',
                'legend' => [
                    'position' => 'in'
                ]
            ]);
        }else{
            /*
            statements for if array : page_visits will contain some records 
            Right now GA's dummy view_id returning null records so unable to understand the array 
            and result set so this condition is blank for now 
            */
        }


        return view('GAapi.statistics');//compact('data')
      
    }

    public function displayChart(){

        $population = Lava::DataTable();

        $population->addDateColumn('Year')
                   ->addNumberColumn('Number of People')
                   ->addRow(['2006', 623452])
                   ->addRow(['2007', 685034])
                   ->addRow(['2008', 716845])
                   ->addRow(['2009', 757254])
                   ->addRow(['2010', 778034])
                   ->addRow(['2011', 792353])
                   ->addRow(['2012', 839657])
                   ->addRow(['2013', 842367])
                   ->addRow(['2014', 873490]);

        Lava::BarChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return view('GAapi.statistics' );

    }
}
