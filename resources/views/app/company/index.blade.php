@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/companies">Companies</a></li>
                    </ol>
                </nav>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3 offset-9">
                            <a class="btn btn-primary btn-block" href="/company/create">Add Company</a>
                        </div>
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr onclick="location.href='/company/show/{{ $company->id }}';">
                                    <td scope="row">{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6 offset-3">
                            {{ $companies->links() }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
