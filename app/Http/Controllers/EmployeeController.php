<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //***************************//
    // registration function is for view employee registration form
    //***************************//
    public function registration()
    {

        return view('register');

    }


    //***************************//
    // registered function is for submitting employee registration form Data
    //***************************//
    public function registered(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'city' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',

        ]);


        $employee = new Employee();

        $employee->name       = $request['name'];
        $employee->email      = $request['email'];
        $employee->birth_date = $request['date'];
        $employee->city       = $request['city'];
        $employee->password   = Hash::make( $request['password']);
        $employee->save();

        return redirect('/');

    }


    //***************************//
    // Index function is for fetching employee data from Database with search funnality
    //***************************//
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";

        if($request != "")
        {
            $employee = Employee::where('name', 'LIKE' ,"%$search%")->orwhere('email', 'LIKE' ,"%$search%")->orwhere('city', 'LIKE' ,"%$search%")->orwhere('birth_date', 'LIKE' ,"%$search%")->get();
        }
        else
        {
            $employee = Employee::all();
        }


        $data = compact('employee');

        return view('employees')->with($data);
    }


    //***************************//
    // registered function is for viewing employee Edit form with old Data
    //***************************//
    public function edit($id)
    {
        $employee = Employee::find($id);
        $data = compact('employee');
        return view('edit')->with($data);
    }

    
    //***************************//
    // Update function is for updating employee data in database
    //***************************//
    public function Update(Request $request, $id)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'city' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',

        ]);

        $employee = Employee::find($id);
        

        $employee->name       = $request['name'];
        $employee->email      = $request['email'];
        $employee->birth_date = $request['date'];
        $employee->city       = $request['city'];
        $employee->password   = Hash::make( $request['password']);
        $employee->save();

        return redirect('/');
    }

    //***************************//
    // trash function is for move employee data into trash 
    //***************************//
    public function trash($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/');
    }

    //***************************//
    // viewtrash function is for viewing trash employee data  
    //***************************//
    public function viewtrash()
    {
        $employee = Employee::onlyTrashed()->get();
        $data = compact('employee');
        return view('trash')->with($data);
    }

    //***************************//
    // restore function is for restoring trash employee data  
    //***************************//
    public function restore($id)
    {
        $employee = Employee::onlyTrashed()->find($id);
        $employee->restore();
        return redirect('/');
    }

    //***************************//
    // destroy function is for completely delete employee data  
    //***************************//
    public function destroy($id)
    {
        $employee = Employee::withTrashed()->find($id);
        $employee->forceDelete();
        return redirect('/viewtrash');
    }

}
