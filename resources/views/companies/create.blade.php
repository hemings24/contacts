@extends('layouts.main')
@section('title', 'Contacts | Add Company')
@section('content')
<div class="py-5">
   <div class="container">
      <div class="row justify-content-md-center">
         <div class="col-md-8">
            <div class="card">

               <div class="card-header card-title">
                  <strong>Add New Company</strong>
               </div>

               <div class="card-body">
                  <form action="{{route('companies.store')}}" method="POST">
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