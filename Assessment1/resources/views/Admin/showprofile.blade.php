@extends('Admin.master-layout-auth')
@section('router-outlet')

<section style="background-color: #eee;">
  <div class="container py-5 bg-dark">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center bg-warning">
            <img src="{{Auth::user()->image? asset('profile_image/'.Auth::user()->image):'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp'}}" 
              class="img-fluid" style="width: 275px;">
            <h5 class="my-3"></h5><h4><u><i>{{Auth::user()->name}}</i></u></h4>
            <p class="text-muted mb-1"><h5><i>Software Developer</i></h5></p>
            <div class="d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-success bg-dark"><a href="{{route('EDITPROFILE')}}">
                Edit Profile
              </a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body bg-success">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-1"><h5>Name</h5></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><i><h4><u>{{Auth::user()->name}}</u></h4></i></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-1"><h5>User Name</h5></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><i><h4><u>{{Auth::user()->username}}</u></h4></i></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-1"><h5>Phone Number</h5></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><i><h4><u>{{Auth::user()->phoneno}}</u></h4></i></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-1"><h5>Email</h5></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><i><h4><u>{{Auth::user()->email}}</u></h4></i></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
