@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    All Employees
                    <div class="float-right">
                        <a href="{{route('employees.create')}}" class="btn btn-primary">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->full_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <a href="{{route('companies.show',$employee->company->id)}}">
                                        {{$employee->company->name}}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('employees.show', $employee->id) }}"
                                           class="btn btn-dark">
                                            <i class="fa fa-edit"></i>
                                            View
                                        </a>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                           class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="javascript:void(0);"
                                           onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-company-{{ $employee->id }}').submit(); } else { return false; }"
                                           class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </a>
                                    </div>
                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                          method="post"
                                          id="delete-company-{{ $employee->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                No employees !
                            </tr>
                        @endforelse
                        </tbody>
                        {{$employees->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
