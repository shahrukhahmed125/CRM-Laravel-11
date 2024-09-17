@extends('masterpage')
@section('title', 'Edit Pipline')
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
                      {{ session()->get('success') }}
                  </div>
              </div>
          </div>
      </div>
      @endif
      <div class="page-header">
        <h3 class="page-title">Complete Details</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pipline</li>
            </ol>
        </nav>
      </div>
      <div class="">

        <form action="{{route('sales.pipelines.update', $pipeline->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pipline Details</h4>
    
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Pipline Name*</label>
                                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                            value="{{$pipeline->name}}">
                                        @error('name')
                                            <p class="invalid-feedback">{{'*'.$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="number" class="form-control form-control-lg @error('position') is-invalid @enderror" name="position"
                                            value="{{$pipeline->position}}">
                                        @error('position')
                                            <p class="invalid-feedback">{{'*'.$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label>Description</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description">{{$pipeline->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class=" mt-3 btn btn-success btn-lg">Update</button>
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