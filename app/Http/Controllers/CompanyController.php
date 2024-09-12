<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
   public function __construct()
   {
      $this->middleware(['auth','verified']);
   }

   public function index()
   {
      //$companies = auth()->user()->companies()->latest()->paginate(10);
      //$companies = auth()->user()->companies()->with('contacts')->latest()->paginate(10);      
      //$companies = auth()->user()->companies()->withCount('contacts')->latest()->paginate(10);
      $companies = Company::latest()->paginate(10);

      return view("companies.index", compact('companies'));
   }
   
   public function create()
   {
      $company = new Company;

      return view('companies.create', compact('company'));
   }

   public function store(CompanyRequest $request)
   {
      $request->user()->companies()->create($request->all());

      return redirect()->route('companies.index')->with('message',"Company has been added");
   }
   
   public function show(Company $company)
   {
      return view("companies.show", compact('company'));
   }
      
   public function edit(Company $company)
   {
      return view("companies.edit", compact('company'));
   }
   
   public function update(CompanyRequest $request, Company $company)
   {
      $company->update($request->all());

      return redirect()->route('companies.index')->with('message',"Company has been updated");
   }
   
   public function destroy(Company $company)
   {
      $company->delete();

      return redirect()->route('companies.index')->with('message',"Company has been removed");
   }
}