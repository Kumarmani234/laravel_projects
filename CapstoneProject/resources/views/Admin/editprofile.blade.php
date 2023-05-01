@extends('Admin.master-layout-auth')
@section('router-outlet')

<div class="container bootstrap snippets bootdey bg-dark">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <form  method="post" action="{{route('UPDATEPROFILE')}}" class="form-horizontal" enctype="multipart/form-data" role="form">
        @csrf
      <div class="container">
            <div class="row">
                <div class="col-md-4">
               
                <div class="text-center">
              <img src="{{Auth::user()->image?asset('profile_image/'.Auth::user()->image):'https://bootdey.com/img/Content/avatar/avatar7.png'}}" class="avatar img-circle img-thumbnail" alt="avatar">  <!--  -->
                <h6>Upload a different photo...</h6>
                
                <input type="file" class="form-control" name='image'>
                </div>
              </div>
              
            <div class="col-md-8">
            <div class="col-md-9 personal-info">
        
        <h3>***********<u>Personal information</u>***********</h3>
        
          <div class="class-body bg-secondary">
          <div class="form-group mb-4">
            <label class="col-lg-3 control-label"><h4><i>Name:</i></h4></label>
            <div class="col-lg-8">
              <input class="form-control" name="name" type="text" value="{{Auth::user()->name}}">
            </div>
          </div>
          <div class="form-group mb-4">
            <label class="col-lg-3 control-label"><h4><i>Username:</i></h4></label>
            <div class="col-lg-8">
              <input class="form-control"name="username" type="text" value="{{Auth::user()->username}}">
            </div>
          </div>
          <div class="form-group mb-4">
            <label class="col-lg-4 control-label"><h4><i>Mobile Number:</i></h4></label>
            <div class="col-lg-8">
              <input class="form-control" name="phoneno" type="text" value="{{Auth::user()->phoneno}}">
            </div>
          </div>
          <div class="form-group mb-4" >
            <label class="col-lg-3 control-label"><h4><i>Email:</i></h4></label>
            <div class="col-lg-8">
              <input class="form-control"name="email" type="email" value="{{Auth::user()->email}}">
            </div>
          </div>
         <button type="submit" class="btn btn-dark bg-primary">Update</button>
            </div>
            </div>
        </div>
      
</div>
      <!-- edit form column -->
      
          
        </form>
      </div>
  </div>
</div>
<hr>
@endsection
