<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Student;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id==3) {
            $students = Student::all()->toArray();
        }else{
            $students = Student::all()->where('userId', '=', Auth::user()->id)->toArray();
        }
        $student = null;
        return view('home',compact('students','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
          'first_name' => 'required',
          'last_name'  => 'required',
          'file_name' => 'required|file'
        ]);
        $student = new Student([
          'first_name' => $request->get('first_name'),
          'last_name'  => $request->get('last_name'),
          'file_name' => $request->file_name->store('uploadedFiles'),
          'userId' => $request->get('userId'),
           $request->file_name->store('uploadedFiles')
        ]);
        $student->save();
        return redirect()->route('home')->with('success', 'Customer saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filename = Student::find($id);
        return response()->download(storage_path('app/'.$filename->file_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $student = Student::find($id);
        if (Auth::user()->id==3) {
            $students = Student::all()->toArray();
        }else{
            $students = Student::all()->where('userId', '=', Auth::user()->id)->toArray();
        }
        return view('home', compact('student','students','id'));  
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
          'first_name' => 'required',
          'last_name'  => 'required'
        ]);
          $student = Student::find($id);
          $student->first_name = $request->get('first_name');
          $student->last_name  = $request->get('last_name');
          if ($request->file_name !=null) {
          Storage::delete($student->file_name);
          $student->file_name = $request->file_name->store('uploadedFiles');
            
          }

        $student->save();
        //$request->file_name->store('uploadedFiles');
        return redirect()->route('home')->with('success', 'Customer Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        Storage::delete($student->file_name);
        return redirect()->route('home')->with('success','Record deleted Successfully');
    }

    
}
