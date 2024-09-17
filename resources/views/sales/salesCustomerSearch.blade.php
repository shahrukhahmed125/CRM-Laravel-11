@extends('masterpage')
@section('title', 'Search Data Customers')
@section('css')

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
                    <li class="breadcrumb-item"><a href="{{ route('sales.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customers Search</li>
                </ol>
            </nav>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customers Results</h4>
                  <div class="table-responsive">
                    @if ($data->isEmpty())
                        <p>No customers found.</p>
                    @else
                        <table class="table">
                        <thead>
                            <tr>
                            <th>
                                <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                </label>
                                </div>
                            </th>
                            <th> Client Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Company </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $client)
                                <tr>
                                <td>
                                    <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                    </label>
                                    </div>
                                </td>
                                <td>{{Str::title($client->first_name. ' ' .$client->last_name)}}</td>
                                <td> {{$client->email}} </td>
                                <td> {{$client->phone}} </td>
                                <td> {{$client->company}}</td>
                                <td>
                                <a href="{{route('sales.editCustomerData', $client->id)}}" class="btn btn-warning">Edit</a>
                                </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                        </table>

                    @endif
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

<script>
  const myTimeout = setTimeout(closeAlert, 3000);

  function closeAlert() {
      document.getElementById("toast").style.display = 'none';
  }
</script>

@endsection