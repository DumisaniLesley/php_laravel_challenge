<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('app.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        # Validation
        $this->validate(request(),[
          'name'    => 'required|min:2',
          'email'   => 'required',
          'website' => 'required',
        ]);

        # Store image in public folder
        if (!empty(request('logo'))) {
            $file     = request('logo');
            $logo     = $file->store('public');
        }else {
            $logo = "";
        }

        Company::create([
            'name'      => request('name'),
            'email'     => request('email'),
            'logo'      => $logo,
            'website'   => request('website'),
        ]);

        # proceed to companies show page with success message
        $company = Company::get()->last();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have suscessfully add a company!');

        return view('app.company.show',compact('company'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        $employees = Employee::where('companyID',$company->id)->paginate(10);
        return view('app.company.show',compact('company','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('app.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate(request(),[
          'name'    => 'required|min:2',
          'email'   => 'required',

        ]);

        $company = Company::find(request('companyID'));

        $company->name    = request('name');
        $company->email   = request('email');
        $company->website = request('website');

        if (!empty(request('logo'))) {
            # change the logo
            $file     = request('logo');
            $logo     = $file->store('public');
            $company->logo = $logo;
        }
        $company->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have edited the company details!');

        $company = Company::find(request('companyID'));
        return view('app.company.show',compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Company::find(request('companyID'));
        $company->delete();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Success, you have deleted the company!');

        $companies = Company::paginate(10);
        return view('app.company.index',compact('companies'));
    }
}
