@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    {{$company->name}}
                    <strong>-Company</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Id</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$company->id}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$company->name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$company->email}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Phone</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{$company->phone}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Website</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    <a href="{{$company->website}}">website link</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
