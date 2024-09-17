@extends('masterpage')
@section('title', 'Admin Edit User')
@section('css')

<style>
    #datepicker {
        padding: 10px;
        font-size: 16px;
    }
</style>
<style>
    .top-right-conner {
        position: fixed;
        top: 8%;
        right: 0;
        z-index: 999;
        /* Ensure it's above other content */
        margin-top: 20px;
        /* Adjust if necessary */
        margin-right: 20px;
        /* Adjust if necessary */
    }
</style>

@endsection

@section('content')


<div class="main-panel">
    <div class="content-wrapper">
        @if (session()->has('msg'))
        <div class="container" style="z-index: 11;">
            <div class="top-right-conner">

                <div class="toast show bg-success" id="toast"
                    style="background-color:#00AC4A;color:white;font-size:18px;font-weight:800;border:none;">
                    <div class="toast-header bg-light">
                        Message
                        <button type="button" class="btn btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        {{ session()->get('msg') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div class="page-header">
        <h3 class="page-title">User Complete Details</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>
    </div>
    <div class="">

        <form action="{{route('admin.editUserDataPost', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Details</h4>
    
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                            value="{{$data->name}}" placeholder="Ex: John">
                                        @error('name')
                                            <p class="invalid-feedback">{{'*'.$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                            value="{{$data->email}}" placeholder="Ex: John@gmail.com">
                                        @error('email')
                                            <p class="invalid-feedback">{{'*'.$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date">Verified Date</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control form-control-lg" id="datepicker" value="@if ($data->email_verified_at != null) {{$data->email_verified_at->format('Y-m-d')}} @endif"
                                                name="email_verified_at" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Role*</label>
                                        <div class="">
                                            <select class="form-control form-control-lg @error('role') is-invalid @enderror" name="role">
                                                <option selected disabled>Select Status</option>
                                                <option value="admin" @if ($data->role =='admin' ) selected @endif>Admin</option>
                                                <option value="sales" @if ($data->role =='sales' ) selected @endif>Sales</option>
                                                <option value="support" @if ($data->role =='support' ) selected @endif>Support</option>
                                                <option value="user" @if ($data->role =='user' ) selected @endif>User</option>
                                            </select>
                                            @error('role')
                                                <p class="invalid-feedback">{{'*'.$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class=" mt-3 btn btn-primary btn-lg">Update</button>
                            <a href="{{route('admin.userData')}}" class=" mt-3 btn btn-danger btn-lg">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script>
    const myTimeout = setTimeout(closeAlert, 3000);

    function closeAlert() {
        document.getElementById("toast").style.display = 'none';
    }
</script>

@endsection