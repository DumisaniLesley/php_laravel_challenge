<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('app.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $company = Company::find($id);
        return view('app.employee.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
          'firstName'    => 'required|min:2',
          'lastName'    => 'required|min:2',
          'email'       => 'unique:employees'
        ]);

        Employee::create([
            'firstName'  => request('firstName'),
            'lastName'   => request('lastName'),
            'companyID'  => request('companyID'),
            'email'      => request('email'),
            'phone'      => request('phone'),
        ]);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have suscessfully added an Employee!');

        $employee = Employee::get()->last();

        return view('app.employee.show',compact('employee'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('app.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('app.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
          'firstName'    => 'required|min:2',
          'lastName'     => 'required|min:2',
        ]);

        $employee = Employee::find(request('employeeID'));
        $employee->firstName = request('firstName');
        $employee->lastName  = request('lastName');
        $employee->email     = request('email');
        $employee->phone     = request('phone');
        $employee->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have suscessfully edited an Employee!');

        $employee = Employee::find($employee->id);

        return view('app.employee.show',compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find(request('employeeID'));
        $employee->delete();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have deleted the employee!');

        $companies = Company::paginate(10);
        return view('app.company.index',compact('companies'));
    }
}
