<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Charthelpers\WidgetChart;
use Session;
use App\Widget;
use DB;

class WidgetController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChartDashboard $chart)
    {
        $count =  DB::table('attendances')->count();
      if (session()->has('message')){
        Session::flash('noResults', 'Sorry, we found 0 results');
    }

      $chartData = $chart->chartDataFromAllRecords();
      return view('widget.index', compact('widgets', 'count', 'chartData'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('widget.create');
	 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
       'widget_name' => 'required|unique:widgets|alpha_num|max:20',
    ]);
	
      $widget = Widget::create(['widget_name' => $request->widget_name]);
      $widget->save();
	  
      return Redirect::route('widget.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $widget = Widget::findOrFail($id);
      return view('widget.show', compact('widget', 'count'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $widget = Widget::findOrFail($id);
      return view('widget.edit', compact('widget', 'count'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'widget_name' => 'required|unique:widgets|alpha_num|max:20',
      ]);
		
      $widget = Widget::findOrFail($id);
      $widget->update(['widget_name' => $request->widget_name]);
	  
      return Redirect::route('widget.show', ['widget' => $widget]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Widget::destroy($id);
      return Redirect::route('widget.index');
    }
	
	
	/**
     * Search from storage.
     *
     * @param 
     * @return
     */
	public function search(Request $request, WidgetChart $chart)
    {
	  $this->validate($request, [
        'widget_name' => 'required|alpha_num|max:20',
      ]);

      $searchterm = $request->widget_name;
        $widgets = DB::table('widgets');
        $results = $widgets->where('widget_name', 'LIKE', '%'. $searchterm .'%')
             ->get();
		

      if (count($results) > 0){
        $count = count($results);
		$chartData = $chart->chartDataFromAllRecords();  
        return view('widget.resultsindex', compact('results', 'count', 'chartData'));
      }

        return Redirect::route('widget.index')->with('message', ['Sorry, no results!']);
    }
}
