@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    All Companies
                    <div class="float-right">
                        <a href="{{route('companies.create')}}" class="btn btn-primary">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Employees</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>
                                    <img src="{{ public_path('storage/companies/'.$company->logo) }}/">
                                </td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->employees_count}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->phone}}</td>
                                <td>{{$company->website}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('companies.show', $company->id) }}"
                                           class="btn btn-dark">
                                            <i class="fa fa-edit"></i>
                                            View
                                        </a>
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                           class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="javascript:void(0);"
                                           onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-company-{{ $company->id }}').submit(); } else { return false; }"
                                           class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </a>
                                    </div>
                                    <form action="{{ route('companies.destroy', $company->id) }}"
                                          method="post"
                                          id="delete-company-{{ $company->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                No companies !
                            </tr>
                        @endforelse
                        </tbody>
                        {{$companies->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
