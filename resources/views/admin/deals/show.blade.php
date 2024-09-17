@extends('masterpage')
@section('title', 'View Deal')
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
                <li class="breadcrumb-item active" aria-current="page">View Deal</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <p><strong>Customer:</strong> {{ Str::title($deal->customer->first_name.' '.$deal->customer->last_name) ?? 'No customer assigned' }}</p>
                <p><strong>Pipeline:</strong> {{ $deal->pipeline->name ?? 'No pipeline assigned' }}</p>
                <p><strong>Amount:</strong> ${{ number_format($deal->amount, 2) }}</p>
                <p><strong>Status:</strong> {{ ucfirst($deal->stage) }}</p>
                <p><strong>Expected Close Date:</strong> {{ $deal->closing_date }}</p>
                <p><strong>Details:</strong> {{ $deal->notes ?? 'No details provided' }}</p>
                <p><strong>Created at:</strong> {{ $deal->created_at->format('Y-m-d') }}</p>
                <a href="{{ route('admin.deals.index') }}" class="btn btn-secondary">Back to Deals</a>
            </div>
          </div>
        </div>
        {{-- <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Deals in this Pipeline</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Deal Name</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Expected Close Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($pipeline->deals->isEmpty())
                            <p>No deals available for this pipeline.</p>
                        @else
                            @foreach($pipeline->deals as $deal)
                                <tr>
                                    <td>{{ $deal->deal_name }}</td>
                                    <td>{{ $deal->customer->first_name.' '.$deal->customer->last_name  ?? 'No customer assigned' }}</td> <!-- Safeguard if customer is missing -->
                                    <td>{{ $deal->deal_value }}</td>
                                    <td>{{ ucfirst($deal->stage) }}</td>
                                    <td>{{ $deal->closing_date }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                  <a href="{{ route('pipelines.index') }}" class="btn btn-secondary mt-3">Back to Pipelines</a>
                </div>
              </div>
            </div>
        </div> --}}
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