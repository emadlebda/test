<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Str;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('employees')->paginate(15);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $file_name = '';
        if ($image = $request->file('logo')) {
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = storage_path('app/public/companies/' . $file_name);
            Image::make($image->getRealPath())->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
        }

        Company::create(array_merge($request->validated(), ['logo' => $file_name]));

        return redirect()->route('companies.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $file_name = $company->logo;
        if ($image = $request->file('logo')) {
            if ($company->logo != null && File::exists('app/public/companies/' . $company->logo)) {
                unlink('app/public/companies/' . $company->logo);
            }
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = storage_path('app/public/companies/' . $file_name);
            Image::make($image->getRealPath())->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
        }

        $company->update(array_merge($request->validated(), ['logo' => $file_name]));

        return redirect()->route('companies.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Company $company)
    {
        if (File::exists('app/public/companies/' . $company->logo)) {
            unlink('app/public/companies/' . $company->logo);
        }
        $company->delete();

        return redirect()->route('companies.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
