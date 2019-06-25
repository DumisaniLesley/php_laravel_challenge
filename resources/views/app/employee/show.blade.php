@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/companies">Companies</a></li>
                        <li class="breadcrumb-item"><a href="/company/show/{{ $employee->company->id }}">{{ $employee->company->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a href="/employee/show/{{ $employee->id }}">{{ $employee->firstName }} {{ $employee->lastName }}</a></li>
                    </ol>
                </nav>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3 offset-6">
                            <form
                                onSubmit="return confirm('\n You are about to delete {{ $employee->firstName }}. \n Do you wish to continue?');"
                                class="form-horizontal" role="form" method="POST" action="/employee/destroy">
                                {{ csrf_field() }}
                                <input type="hidden" name="employeeID" value="{{ $employee->id }}">
                                <td><button type="submit" class="btn btn-danger btn-block">Delete Employee</button> </td>
                            </form>

                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary btn-block" href="/employee/edit/{{ $employee->id }}">Edit
                                Employee</a>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="companyDetails">
                                <h3>{{ $employee->firstName }} {{ $employee->lastName }}</h3>
                                <dl class="row">
                                    <dt class="col-sm-2">Email</dt>
                                    <dd class="col-sm-10">{{ $employee->email }} </dd>
                                    <dt class="col-sm-2">Website</dt>
                                    <dd class="col-sm-10">{{ $employee->phone }}</dd>

                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
