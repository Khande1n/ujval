<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChartDashboard $chart)
    {
      // $widgets = Widget::paginate(10);
        $count =  DB::table('attendances')->distinct('student_id')->count();
      if (session()->has('message')){
        Session::flash('noResults', 'Sorry, we found 0 results');
    }

      $chartData = $chart->chartDataFromAllRecords();
      return view('widget.index', compact('count', 'chartData'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('principal/create');
	 
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
       'guardian_1_name' => 'required|alpha',
       'guardian_2_name' => 'required|alpha',
       'contact_1' => 'required|unique:contacts|numeric|digits:10',
       'contact_2' => 'unique:contacts|numeric|digits:10',
       'add_line_1' => '',
       'add_line_2' => '',
       'street' => '',
       'pincode' => 'required|numeric|',
       'grade_name' => 'required|unique:grades|alpha:3',
       'grade_section' => 'required|alpha',
       'login_name' => 'alpha_num:20',
       'email' => 'required|unique:logins|email',
       'password' => 'alpha_num|max:60',
       'max_marks' => 'required|numeric|max:3',
       'obt_marks' => 'required|unique:marks|digits|max:3',
       'pass_marks' => 'numeric',
       'role_name' => 'required|unique:roles|alpha',
       'school_name' => 'required|unique:schools|alpha',
       'staff_name' => 'required|alpha',
       'bday' => 'required|date',
       'student_name' => 'required|alpha',
       'sub_name_first' => 'required|unique:subjects|alpha_num',
       'sub_name_second' => 'alpha_num',
       'test_name' => 'required|alpha_num',
       'test_date' => 'required|date',
       
    ]);
	
      $guardian_1_name = Guardian::create(['guardian_1_name' => $request->guardian_1_name]);
	  $guardian_1_name->save();
	  
	  $guardian_2_name = Guardian::create(['guardian_2_name' => $request->guardian_2_name]);
	  $guardian_2_name->save();
	  
	  $contact_1 = Contact::create(['contact_1' => $request->contact_1]);
	  $contact_1->save();
	  
	  $contact_2 = Contact::create(['contact_2' => $request->contact_2]);
	  $contact_2->save();
	  
	  $add_line_1 = Address::create(['add_line_1' => $request->add_line_1]);
	  $add_line_1->save();
	  
	  $add_line_2 = Address::create(['add_line_2' => $request->add_line_2]);
	  $add_line_2->save();
	  
	  $street= Address::create(['street' => $request->street]);
	  $street->save();
	  
	  $pincode = Address::create(['pincode' => $request->pincode]);
	  $pincode->save();
	  
	  $grade_name = Grade::create(['grade_name' => $request->grade_name]);
	  $grade_name->save();
	  
	  $grade_section = Grade::create(['grade_section' => $request->grade_section]);
	  $grade_section->save();
	  
	  $login_name = Login::create(['login_name' => $request->login_name]);
	  $login_name->save();
	  
	  $email = Login::create(['email' => $request->email]);
	  $email->save();
	  
	  $password = Login::create(['password' => $request->password]);
	  $password->save();
	  
	  $max_marks = Marks::create(['max_marks' => $request->max_marks]);
	  $max_marks->save();
	  
	  $obt_marks = Marks::create(['obt_marks' => $request->obt_marks]);
	  $obt_marks->save();
	  
	  $pass_marks = Marks::create(['pass_marks' => $request->pass_marks]);
	  $pass_marks->save();
	  
	  $role_name = Role::create(['role_name' => $request->role_name]);
	  $role_name->save();
	  
	  $school_name = School::create(['school_name' => $request->school_name]);
	  $school_name->save();
	  
	  $staff_name = Staff::create(['staff_name' => $request->staff_name]);
	  $staff_name->save();
	  
	  $bday = Staff::create(['bday' => $request->bday]);
	  $bday->save();
	  
	  $student_name = Student::create(['student_name' => $request->student_name]);
	  $student_name->save();
	  
	  $sub_name_first = Subject::create(['sub_name_first' => $request->sub_name_first]);
	  $sub_name_first->save();
	  
	  $sub_name_second = Subject::create(['sub_name_second' => $request->sub_name_second]);
	  $sub_name_second->save();
	  
	  $test_name = Test::create(['test_name' => $request->test_name]);
	  $test_name->save();
	  
	  $test_date = Test::create(['test_date' => $request->test_date]);
	  $test_date->save();
	  
      return Redirect::route('principal.dashboard');
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
