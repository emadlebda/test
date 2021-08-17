@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Create New Company
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('companies.update',$company->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" type="text" name="name"
                                       value="{{ old('name', $company->name) }}"
                                       placeholder="Company Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="email" name="email"
                                       value="{{ old('email', $company->email) }}"
                                       placeholder="Company Email" autocomplete="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" id="phone" type="tel" name="phone"
                                       value="{{ old('phone', $company->phone) }}"
                                       placeholder="Company Phone" autocomplete="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">Website</label>
                            <div class="col-md-9">
                                <input class="form-control" id="website" type="url" name="website"
                                       value="{{ old('website', $company->website) }}"
                                       placeholder="Company website" autocomplete="website">
                                @error('website')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="logo">Logo</label>
                            <div class="col-md-9">
                                <input id="logo" type="file" name="logo">
                                @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9">
                                <input type="submit" name="create" class=" float-right btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
