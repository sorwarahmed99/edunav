@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    <h1 class="h3  text-white text-center"><b>Dashboard</b></h1>
    <br>
  	<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-white text-center">Dashboard</h1>
  	</div> -->
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\User::count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Applicants</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\StudentInformation::count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Join</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\User::where('created_at', '>=', \Carbon\Carbon::today())->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-info"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today Contacts</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Contact::where('created_at', '>=', \Carbon\Carbon::today())->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-envelope fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <a href="{{ route('allUsers') }}">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Others</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Coming Soon</div>
                  </a>
                </div>
                <div class="col-auto">
                  <i class="fa fa-star fa-2x text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>


@endsection