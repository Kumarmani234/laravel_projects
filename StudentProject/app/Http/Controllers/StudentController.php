<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = student::latest()->paginate(4) ;
        //return "cvxcvxcvxcv";
        
       return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'student_name'          =>  'required',
            'student_rollno'         =>  'required',
            'student_marks'         =>  'required',
            'student_address'         =>  'required',
            'student_image'         =>  'required|image'

        ]);

        $file_name = time() . '.' .request()->student_image->getClientOriginalExtension();

        request()->student_image->move(public_path('images'), $file_name);

        $student = new student;

        $student->student_name = $request->student_name;
        $student->student_rollno = $request->student_rollno;
        $student->student_marks = $request->student_marks;
        $student->student_address = $request->student_address;
        $student->student_image = $file_name;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Successfully added the details .');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        return view('show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        $request->validate([

            'student_name'          =>  'required',
            'student_rollno'         =>  'required',
            'student_marks'         =>  'required',
            'student_address'         =>  'required',
            'student_image'     =>  'image'
        ]);

        $student_image = $request->hidden_student_image;

        if($request->student_image != '')
        {
            $student_image = time() . '.' . request() -> student_image->getClientOriginalExtension();

            request()->student_image->move(public_path('images'), $student_image);
        }

        $student = student::find($request->hidden_id);

        $student->student_name = $request->student_name;

        $student->student_rollno = $request->student_rollno;

        $student->student_marks = $request->student_marks;

        $student->student_address = $request->student_address;

        $student->student_image = $student_image;

        $student->save();

       // return redirect()->route('students.index')->with('success', 'Student Data has been updated successfully');
       return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Data deleted successfully');
    }
}
