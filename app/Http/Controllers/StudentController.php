<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = student::orderBy('student_id', 'asc')->paginate(5);
        return view('student/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('student/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('student_id', $request->student_id);
        Session::flash('name', $request->name);
        Session::flash('address', $request->address);

        $request->validate([
            'student_id'=>'required|numeric',
            'name'=>'required',
            'address'=>'required',
        ], [
            'student_id.required'=>'You must input the Student Id',
            'student_id.numeric'=>'You must input the Student Id in the form of numbers',
            'name.required'=>'You must input the Student Name',
            'address.required'=>'You must input the Student Address',
        ]);
        $data = [
            'student_id' => $request->input('student_id'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ];
        student::create($data);
        return redirect('student')->with('success', 'Successfully added data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = student::where('student_id', $id)->first();
        return view('student/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = student::where('student_id', $id)->first();
        return view('student/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required'
        ],[
            'student_id.numeric'=>'You must input the Student Id in the form of numbers',
            'name.required'=>'You must input the Student Name',
            'address.required'=>'You must input the Student Address',
        ]);
       
        $data = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ];
        student::where('student_id', $id)->update($data);
        return redirect('/student')->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = student::where('student_id', $id)->first();
        student::where('student_id', $id)->delete();
        return redirect('/student')->with('success', 'Successfully delete data');
    }
}
