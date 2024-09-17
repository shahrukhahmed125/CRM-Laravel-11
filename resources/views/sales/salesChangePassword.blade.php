@extends('masterpage')
@section('title', 'Sales Change Password')
@section('css')

@endsection

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
      <div class="page-header">
          <h3 class="page-title"> Password Change </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('sales.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Passowrd Change</li>
            </ol>
          </nav>
        </div>
        <div class="container">
            <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                      <div class="card-body">
                          <p class="card-description"> Password minimum must be 8 characters.</p>
                          <form class="forms-sample" action="{{route('sales.changePasswordPost')}}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="exampleInputPassword1">Old Password</label>
                              <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="oldPassword">
                              @error('oldPassword')
                                  <p class="invalid-feedback">{{'*'.$message}}</p>
                              @enderror
                          </div>
                          <div class="form-group mb-3">
                              <label for="exampleInputConfirmPassword1">New Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputConfirmPassword1" placeholder="Password" name="password">
                              @error('password')
                                  <p class="invalid-feedback">{{'*'.$message}}</p>
                              @enderror
                          </div>
                          <button type="submit" class="btn btn-primary mr-2">Change</button>
                          <a class="btn btn-dark" href="{{route('sales.dashboard')}}">Cancel</a>
                          </form>
                      </div>
                      </div>
                  </div>
            </div>

        </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
    </div>
  </footer>
  <!-- partial -->
</div>

@endsection

@section('js')


@endsection