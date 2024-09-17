@extends('masterpage')
@section('title', 'Edit Deals')
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
                <li class="breadcrumb-item active" aria-current="page">Edit Deals</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Deals Details</h4>
              <form action="{{route('sales.deals.update', $deal->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label for="deal_name">Deal Name</label>
                        <input type="text" name="deal_name" id="title" class="form-control form-control-lg @error('deal_name') is-invalid @enderror" value="{{$deal->deal_name}}" required>
                        @error('deal_name')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label for="closing_date">Closing Date</label>
                        <input type="date" value="{{$deal->closing_date}}" name="closing_date" id="title" class="form-control form-control-lg @error('closing_date') is-invalid @enderror" required>
                        @error('closing_date')
                          <p class="invalid-feedback">{{'*'.$message}}</p>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="pipeline_id">Pipeline</label>
                        <select name="pipeline_id" id="pipeline_id" class="form-control form-control-lg" required>
                          <option value="" selected disabled>Select Pipeline</option>
                            @foreach($pipelines as $pipeline)
                              @if ($deal->pipeline_id == $pipeline->id)
                                <option value="{{ $pipeline->id }}" selected>{{ $pipeline->name }}</option>
                              @else
                                <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <select name="customer_id" id="customer_id" class="form-control form-control-lg" required>
                          <option value="" selected disabled>Select Customer</option>
                            @foreach($customers as $customer)
                                @if ($deal->customer_id == $customer->id)
                                    <option value="{{ $customer->id }}" selected>{{ Str::title($customer->first_name. ' '.$customer->last_name) }}</option>
                                 @else
                                    <option value="{{ $customer->id }}">{{ Str::title($customer->first_name. ' '.$customer->last_name) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>  
                <div class="row mt-3">
                  <div class="col-6">
                    <div class="form-group">
                        <label for="stage">Stage</label>
                        <input type="text" name="stage" id="stage" value="{{$deal->stage}}" class="form-control form-control-lg" required>
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="deal_value">Deal Value</label>
                        <input type="number" name="deal_value" id="deal_value" value="{{$deal->deal_value}}" class="form-control form-control-lg" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="notes">{{$deal->notes}}</textarea>
                    </div>
                  </div>
                </div>
        
                <button type="submit" class="btn btn-success btn-lg mt-2">Update Deal</button>
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