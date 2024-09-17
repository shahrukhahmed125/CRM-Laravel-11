@extends('masterpage')
@section('title', 'Edit Interactions')
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
                <li class="breadcrumb-item active" aria-current="page">Edit Interactions</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Customers Interactions</h4>
              <div class="">

                <form action="{{ route('sales.interactions.update', $interaction->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
            
                                    <div class="row mt-3">
                                      <div class="col-6">
                                        <div class="form-group">
                                            <label>Select Customer</label>
                                            <div class="">
                                                <select class="form-control form-control-lg @error('customer_id') is-invalid @enderror"" name="customer_id" id="customer_id">
                                                  <option value="" selected disabled>Select</option>
                                                  @foreach($customers as $customer)
                                                    @if ($customer->id == $interaction->customer_id)
                                                    <option selected value="{{ $customer->id }}">{{Str::title($customer->first_name.' '.$customer->last_name)  }}</option>
                                                    @endif
                                                    <option value="{{ $customer->id }}">{{Str::title($customer->first_name.' '.$customer->last_name)  }}</option>
                                                  @endforeach
                                                </select>
                                                @error('customer_id')
                                                  <p class="invalid-feedback">{{'*'.$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                            <label>Interaction Type</label>
                                            <div class="">
                                                <select class="form-control form-control-lg @error('type') is-invalid @enderror"" name="type" id="type">
                                                  <option value="" selected disabled>Select</option>
                                                    <option value="call" @if($interaction->type == 'call') selected @endif>Call</option>
                                                    <option value="email" @if($interaction->type == 'email') selected @endif>Email</option>
                                                    <option value="meeting" @if($interaction->type == 'meeting') selected @endif>Meeting</option>
                                                </select>
                                                @error('type')
                                                  <p class="invalid-feedback">{{'*'.$message}}</p>
                                                @enderror
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="details">Details</label>
                                            <textarea class="form-control @error('details') is-invalid @enderror"" id="exampleTextarea1" rows="6" name="details" id="details">{{$interaction->details}}</textarea>
                                            @error('details')
                                              <p class="invalid-feedback">{{'*'.$message}}</p>
                                            @enderror
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <div class="input-group date">
                                                <input type="date" class="form-control form-control-lg @error('date') is-invalid @enderror"" id="datepicker"
                                                    name="date" value="{{$interaction->date}}"/>
                                                @error('date')
                                                    <p class="invalid-feedback">{{'*'.$message}}</p>
                                                @enderror    
                                            </div>
                                        </div>
                                      </div>
                                      @if ($reminder)
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="reminder_at">Set Reminder</label>
                                          <input type="datetime-local" name="reminder_at" id="reminder_at" class="form-control  form-control-lg" value="{{ \Carbon\Carbon::parse($reminder->reminder_at)->timezone('Asia/Karachi')->format('Y-m-d\TH:i') }}">
                                        </div>
                                      </div>
                                      @else
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="reminder_at">Set Reminder</label>
                                          <input type="datetime-local" name="reminder_at" id="reminder_at" class="form-control  form-control-lg" value="">
                                        </div>
                                      </div> 
                                      @endif
                                    </div>
                                    <button type="submit" class=" mt-3 btn btn-info btn-lg">Update Interaction</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script>
  const myTimeout = setTimeout(closeAlert, 3000);

  function closeAlert() {
      document.getElementById("toast").style.display = 'none';
  }
</script>

@endsection