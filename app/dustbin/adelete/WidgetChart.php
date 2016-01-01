<?php

namespace App\ChartHelpers;

use App\Widget;
use DB;

class WidgetChart
{

   public function chartDataFromAllRecords()
   {

       $yearCounts = Widget::select
       	(
       		DB::raw('year(created_at) as year'),
            DB::raw('count(widget_name) as `count`')
	   	)
           ->groupBy('year')
           ->having('year', '>', '2011')->get();

       $chartData = $this->formatResultOf($yearCounts);

       return $chartData;

   }

   public function chartDataFrom($searchTerm)
   {

           $yearCounts = Widget::select(DB::raw('year(created_at) as year'),
               DB::raw('count(widget_name) as `count`'))
               ->where('widget_name', 'LIKE', '%'. $searchTerm .'%')
               ->groupBy('year')
               ->get();

           $chartData = $this->formatResultOf($yearCounts);

           return $chartData;

   }

   protected function convertToString($results)
   {
       foreach ($results as $key => $val)
       {

           foreach ($val as $k => $v)
           {


               if (is_numeric($v))
               {

                   $results[$key][$k] = (string) $v;

               }

           }
       }

       return $results;
   }

   /**
    * @param $yearCounts
    * @return mixed
    */
   private function formatResultOf($yearCounts)
   {
       $results = $yearCounts->toArray();

       $chartData = $this->convertToString($results);

       return $chartData;
   }


}
