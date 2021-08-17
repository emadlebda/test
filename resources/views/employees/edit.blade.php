@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Edit Employee: {{$employee->full_name}}
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('employees.update',$employee->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">First Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="first_name" type="text" name="first_name"
                                       value="{{ old('name', $employee->first_name) }}"

                                       placeholder="Employee First Name">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Last Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="last_name" type="text" name="last_name"
                                       value="{{ old('name', $employee->last_name) }}"

                                       placeholder="Employee Last Name">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="email" name="email"
                                       value="{{ old('name', $employee->email) }}"
                                       placeholder="Employee Email" autocomplete="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" id="phone" type="tel" name="phone"
                                       value="{{ old('name', $employee->phone) }}"
                                       placeholder="Employee Phone" autocomplete="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="company_id">Company</label>
                            <div class="col-md-9">
                                <select name="company_id" class="form-control">
                                    <option value="">---</option>
                                    @forelse($companies as $company)
                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : null }}>{{ $company->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('company_id')
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
