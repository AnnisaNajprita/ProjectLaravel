<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index () 
    {
        //$data = student::all();
        $data = student::orderBy('student_id', 'asc')->paginate(1);
        return view('student/index')->with('data', $data);
    }
    function detail($id)
    {
        $data = student::where('student_id', $id)->first();
        return view('student/show')->with('data', $data);
    }
    function create()
    {

    }
    function delete ()
    {
        
    }

}
