@extends('masterpage')
@section('title', 'Support Edit Customer')
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
        <h3 class="page-title">Customer Complete Details</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('support.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
            </ol>
        </nav>
    </div>
    <div class="">

        <form action="{{route('support.editCustomerDataPost', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Details</h4>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control form-control-lg" name="phone"
                                        value="{{$data->phone}}" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="">
                                            <select class="form-control form-control-lg" name="status">
                                                <option>Select Status</option>
                                                <option value="Active" {{ strtolower($data->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="Not Active" {{ strtolower($data->status) == 'not active' ? 'selected' : '' }}>Not Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label>Address</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="address">{{$data->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class=" mt-3 btn btn-primary btn-lg">Update</button>
                            <a href="{{route('support.customerData')}}" class=" mt-3 btn btn-danger btn-lg">Cancel</a>
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