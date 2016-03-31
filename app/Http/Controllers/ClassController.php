<?php

namespace App\Http\Controllers;
use App;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Grade;
use App\School;
use App\Mark;
use App\Subject;
use DB;
use Session;
use Auth;
use Knp\Snappy\Pdf as SPDF;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function classroom()
    {
        foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
                $value = $v;
        }
        
        $schools = School::find($value);
        $countUser =  $schools->users->count();
                    
        return view('principal/classroom', compact('countUser'));
    }

    public function grade($grade_id){
        $grade = Grade::find($grade_id);
        return json_encode($grade);
    }

    public function students($classId)
    {
        $grade = Grade::find($classId);
        $students = $grade->students->toArray();
        $examlists = $grade->exams->flatten()->toArray();
        // print_r(json_encode($examlists));
        $i=0;
        
        foreach ($students as $student) {
            $student_id = $student['id'];
            $students[$i]['exams'] = [];
            foreach ($examlists as $exam) {
                $exam_id = $exam['id'];
                $marks = Mark::where('exam_id',$exam_id)->where('student_id',$student_id);
                $obt_marks = "";
                if($marks->count()){
                    $obt_marks = $marks->first()["obt_marks"];
                }
                $exam["obt_marks"] = $obt_marks;
                $subject = Subject::find($exam["subject_id"]);
                $exam["subject"] = $subject["subject"];
                array_push($students[$i]["exams"],$exam);
             }
            $i++;
        }
        return json_encode($students);
    }
    public function createpdf() {

        
        $grade = Input::get('grad_id') ;
        $student_id = Input::get('student_id');


        $grade = Grade::find($grade);
        $student = $grade->students->find($student_id)->toArray();
        foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
                $value = $v;
        }
        $schools = School::find($value);
        $student['school'] = $schools['school'];
        $student['grade'] = $grade["grade"].$grade["grade_section"] ;
        $examlists = $grade->exams->flatten()->toArray();
        $student['subjects'] = [];
        // print_r(typeof($student)); 
        // $student['exams'] = [];
        foreach ($examlists as $exam) {
            $subject = Subject::find($exam["subject_id"])['subject'];
            $exam_id = $exam['id'];
            $marks = Mark::where('exam_id',$exam_id)->where('student_id',$student_id);
            $obt_marks = "";
            if($marks->count()){
                $obt_marks = $marks->first()["obt_marks"];
            }            
            $exam["obt_marks"] = $obt_marks;
            $opt_marks = (intval($obt_marks) * 100)/intval($exam['max_marks']);
            $sub_marks = ($opt_marks*$exam['weightage'])/100;
            $abs_marks = intval(round($opt_marks));
            $exam["opt_marks"] = $obt_marks;
            if($abs_marks >=90)
                $exam["obt_grade"] = "A+";
            else if($abs_marks >=75)
                $exam["obt_grade"] = "A";
            else if($abs_marks >=55)
                $exam["obt_grade"] = "B";
            else if($abs_marks >=35)
                $exam["obt_grade"] = "C";
            else
                $exam["obt_grade"] = "D";
            if($student['subjects']){
                if(isset($student['subjects'][$subject])){
                    $student['subjects'][$subject]['opt_marks'] += $sub_marks;
                    array_push($student['subjects'][$subject]['exams'],$exam);                 
                }
                else{
                    $student['subjects'][$subject]=[];
                    $student['subjects'][$subject]['opt_marks'] = $sub_marks;
                    $student['subjects'][$subject]['exams'] = [];
                    array_push($student['subjects'][$subject]['exams'],$exam);
                }                
            }
            else{
                $student['subjects'][$subject]=[];
                $student['subjects'][$subject]['opt_marks'] = $sub_marks;
                $student['subjects'][$subject]['exams'] = [];
                array_push($student['subjects'][$subject]['exams'],$exam);
            }
        }

        foreach ($student['subjects'] as $key => $subject) {
            $abs_marks = intval(round($subject['opt_marks']));
            if($abs_marks >=90)
                $student['subjects'][$key]["obt_grade"] = "A+";
            else if($abs_marks >=75)
                $student['subjects'][$key]["obt_grade"] = "A";
            else if($abs_marks >=55)
                $student['subjects'][$key]["obt_grade"] = "B";
            else if($abs_marks >=35)
                $student['subjects'][$key]["obt_grade"] = "C";
            else
                $student['subjects'][$key]["obt_grade"] = "D";
        }
        // print_r(json_encode($student['subjects']));
        $html = view('pdf/marksheet',compact('student'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
       return $pdf->stream();

//        $snappy = new SPDF(base_path('vendor/bin/wkhtmltopdf-amd64'));
        // return new Response(
        //     $snappy->getOutputFromHtml($html),
        //     200,
        //     array(
        //         'Content-Type'          => 'application/pdf',
        //         'Content-Disposition'   => 'attachment; filename="'.$student_id.'.pdf"'
        //     )
        // );
    }
    public function createhtml(){
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/createclass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade  = Grade::create([
        'grade'         => ucwords($request->grade),
        'grade_section' => ucwords($request->grade_section),
        'school_id'     => $request->school_id,
        'student_id'    => $request->student_id,
        ]);

        return redirect('admin/createclass')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
