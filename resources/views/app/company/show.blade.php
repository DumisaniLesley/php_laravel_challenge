@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/companies">Companies</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a
                        href="/company/show/{{ $company->id }}">{{ $company->name }}</a></li>
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
                            <a class="btn btn-primary btn-block" href="/company/edit/{{ $company->id }}">Edit Company</a>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary btn-block" href="/employee/create/{{ $company->id }}">Add Employee</a>
                        </div>
                    </div>


                    <br><br>

                    <div class="row">
                        <div class="col-md-2">

                            @if($company->logo)
                                <div class="company" style="background-image: url('{{ Local::getURL($company->logo) }}')"></div>
                            @else
                                <div class="company">
                                    <h1>Z</h1>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-10">
                            <div class="companyDetails">
                                <h3>{{ $company->name }}</h3>
                                <dl class="row">
                                    <dt class="col-sm-2">Email</dt>
                                    <dd class="col-sm-10">{{ $company->email }} </dd>
                                    <dt class="col-sm-2">Website</dt>
                                    <dd class="col-sm-10">{{ $company->website }}</dd>

                                </dl>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4>Employees</h4>

                     <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{$employees}}
                            @foreach($employees as $employee)
                            <tr onclick="location.href='/employee/show/{{ $employee->id }}';">
                                <td scope="row">{{ $employee->id }}</td>
                                <td>{{ $employee->firstName }} {{ $employee->lastName }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6 offset-3">
                            {{ $employees->links() }}
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-3 offset-9">
                            <form
                                onSubmit="return confirm('\n You are about to delete {{ $company->name }}. \n Do you wish to continue?');"
                                class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
                                action="/company/destroy">
                                {{ csrf_field() }}
                                <input type="hidden" name="companyID" value="{{ $company->id }}">
                                <td><button type="submit" class="btn btn-danger btn-block">Delete Company</button> </td>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
