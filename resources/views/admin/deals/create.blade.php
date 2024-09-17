@extends('masterpage')
@section('title', 'Add Deals')
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
        <h3 class="page-title">Complete Details</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Deals</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Deals Details</h4>
              <form action="{{ route('admin.deals.store') }}" method="POST">
                @csrf
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label for="deal_name">Deal Name*</label>
                        <input type="text" name="deal_name" id="title" class="form-control form-control-lg @error('deal_name') is-invalid @enderror" required>
                        @error('deal_name')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label for="closing_date">Closing Date*</label>
                        <input type="date" name="closing_date" id="title" class="form-control form-control-lg @error('closing_date') is-invalid @enderror" required>
                        @error('closing_date')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="pipeline_id">Pipeline*</label>
                        <select name="pipeline_id" id="pipeline_id" class="form-control form-control-lg @error('pipeline_id') is-invalid @enderror" required>
                            <option value="" selected>Select Pipeline</option>
                            @foreach($pipelines as $pipeline)
                                <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                            @endforeach
                            @error('pipeline_id')
                              <p class="invalid-feedback">{{'*'.$message}}</p>
                            @enderror
                        </select>
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="customer_id">Customer*</label>
                        <select name="customer_id" id="customer_id" class="form-control form-control-lg @error('customer_id') is-invalid @enderror" required>
                          <option value="" selected>Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ Str::title($customer->first_name. ' '.$customer->last_name) }}</option>
                            @endforeach
                            @error('customer_id')
                              <p class="invalid-feedback">{{'*'.$message}}</p>
                            @enderror
                        </select>
                    </div>
                  </div>
                </div>  
                <div class="row mt-3">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="stage">Stage*</label>
                        <input type="text" name="stage" id="stage" class="form-control form-control-lg @error('stage') is-invalid @enderror" required>
                        @error('stage')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                      </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="deal_value">Deal Value*</label>
                        <input type="number" name="deal_value" id="deal_value" class="form-control form-control-lg @error('deal_value') is-invalid @enderror" required>
                        @error('deal_value')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                      </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="notes"></textarea>
                    </div>
                  </div>
                </div>
        
                <button type="submit" class="btn btn-success btn-lg mt-2">Create Deal</button>
            </form>
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