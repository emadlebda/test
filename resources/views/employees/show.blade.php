@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    {{$employee->full_name}}
                    <strong>-Employee</strong>
                    <div class="float-right">
                        <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Id</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$employee->id}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Full Name</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$employee->full_name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$employee->email}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Phone</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$employee->phone}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Company</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    <a href="{{route('companies.show',$employee->company->id)}}">{{$employee->company->name}}</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
