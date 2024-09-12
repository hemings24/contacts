<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;


class ContactController extends Controller
{
   public function __construct()
   {
      $this->middleware(['auth','verified']);
   }

   public function index()
   {  
      $contacts = Contact::with('company')->latestFirst()->paginate(10);
      //$contacts = Contact::latestFirst()->paginate(10);

      //$contacts = $user->contacts()->latestFirst()->paginate(10);
      //$contacts = auth()->user()->contacts()->latestFirst()->paginate(10);
      //$contacts = auth()->user()->contacts()->with('company')->latestFirst()->paginate(10);
      
      $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');
      //$companies = Company::userCompanies();

      return view('contacts.index', compact('contacts','companies'));
   }

   public function create()
   {
      $contact = new Contact();
     
      $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');        
      //$companies = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
      //$companies = Company::userCompanies();

      return view('contacts.create', compact('companies','contact'));
   }

   public function store(ContactRequest $request)
   {
      Contact::create($request->all());
      //$request->user()->contacts()->create($request->all());

      return redirect()->route('contacts.index')->with('message','Contact has been added');
   }

   public function edit(Contact $contact)
   {
      $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');
      //$companies = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
      //$companies = Company::userCompanies();

      return view('contacts.edit', compact('companies','contact'));
   }

   public function update(Contact $contact, ContactRequest $request)
   {
      $contact->update($request->all());

      return redirect()->route('contacts.index')->with('message',"Contact has been updated");
   }

   public function show(Contact $contact)
   {
      return view('contacts.show', compact('contact'));
   }

   public function destroy(Contact $contact)
   {
      $contact->delete();

      return redirect()->route('contacts.index')->with('message',"Contact has been deleted");
   }    
}