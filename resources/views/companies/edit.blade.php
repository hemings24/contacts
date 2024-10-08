@extends('layouts.main')
@section('title', 'Contacts | Edit Company')
@section('content')
<div class="py-5">
   <div class="container">
      <div class="row justify-content-md-center">
         <div class="col-md-8">
            <div class="card">

               <div class="card-header card-title">
                  <strong>Edit Company</strong>
               </div>

               <div class="card-body">
                  <form action="{{route('companies.update', $company->id)}}" method="POST">
                     @method('PUT')
                     @csrf
                     @include('companies._form')
                  </form>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection