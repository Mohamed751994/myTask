<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/front.css') }}">

    <title>All Courses</title>



  </head>
  <body>
    
    

  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 pl-4">
          <h3>Courses</h3>
        </div>

        <!-- Search bar -->
        <div class="col-md-6">
           <div class="input-group">
                <input class="form-control py-2" type="search" placeholder="Search by Name" name="search" id="search">
                <span class="input-group-append">
                  <button class="btn btn-primary" type="button">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </div>
        <!-- End -->

        <div class="col-md-3">
          @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    
                  <a  href="{{ route('logout') }}" class="btn btn-danger float-right btn-sm"
                        onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                           <i class="icon-key"></i>{{ __('Logout') }}
                  </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                   </form>

                  <a href="{{ route('dashboard') }}" class="btn btn-primary float-right mr-3 btn-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary float-right">Login</a>
                @endauth
            </div>
            @endif
        </div>
      </div>
    </div>
  </header>