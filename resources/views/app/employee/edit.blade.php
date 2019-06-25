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
                        <li class="breadcrumb-item"> <a href="/employee/show/{{ $employee->id }}">{{ $employee->firstName }} {{ $employee->lastName }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a href="/employee/show/{{ $employee->id }}">Edit</a></li>
                    </ol>
                </nav>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <form method="POST" action="{{ route('updateEmployee') }}">
                        @csrf

                        <input type="hidden" name="employeeID" value="{{ $employee->id }}">

                        <div class="form-group row">
                            <label for="firstName"
                                class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text"
                                    class="form-control @error('firstName') is-invalid @enderror" name="firstName"
                                    value="{{ $employee->firstName }}" autocomplete="firstName" autofocus>

                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName"
                                class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text"
                                    class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                                    value="{{ $employee->lastName }}" autocomplete="lastName" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $employee->email }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ $employee->phone }}" autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3 offset-9">
                                <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                            </div>
                        </div>

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
