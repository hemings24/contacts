<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>@yield('title', 'Contacts App')</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=VarelaRound">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
@yield('styles')
<link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
         <a class="navbar-brand text-uppercase" href="{{url('/')}}">
            <strong>Contacts</strong> App
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbar-toggler">
            @guest
               <ul class="navbar-nav">
                  <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>
               </ul>
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item mr-2"><a href="{{route('login')}}" class="btn btn-outline-secondary">Login</a></li>
                  <li class="nav-item"><a href="{{route('register')}}" class="btn btn-outline-primary">Register</a></li>
               </ul>
            @endguest
            @auth
               <ul class="navbar-nav">
                  <li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link">Dashboard</a></li>
                  <li class="nav-item {{request()->is('companies*') ? 'active' : ''}}"><a href="{{route('companies.index')}}" class="nav-link">Companies</a></li>
                  <li class="nav-item {{request()->is('contacts*') ? 'active' : ''}}"><a href="{{route('contacts.index')}}" class="nav-link">Contacts</a></li>
               </ul>
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->fullName()}}
                     </a>

                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('settings.profile.edit')}}">Settings</a>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           {{__('Logout')}}
                        </a>

                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </li>
               </ul>
            @endauth
         </div>

      </div>
   </nav>
   
   <main>
      @yield('content')
   </main>

   <script src="{{asset('js/jquery.min.js')}}"></script>
   <script src="{{asset('js/popper.min.js')}}"></script>
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
   @yield('scripts')
   <script src="{{asset('js/app.js')}}"></script>
</body>
</html>