@extends('masterpage')
@section('title', 'Deals')
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
                <li class="breadcrumb-item active" aria-current="page">Deals</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Customers</h4>
              <div class="table-responsive">
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
                      <th> Deal Name </th>
                      <th> Customer </th>
                      <th>Deal Value</th>
                      <th> Pipline Stage </th>
                      <th> Notes </th>
                      <th> Closing Date </th>
                      <th> Sales Rep </th>
                      <th> Status </th>
                      <th> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($deals as $deal)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>{{ $deal->deal_name }}</td>
                            <td>{{ Str::title($deal->customer->first_name. ' '.$deal->customer->last_name) ?? 'N/A' }}</td>
                            <td>{{ $deal->deal_value }}</td>
                            <td>{{ $deal->pipeline->name ?? 'N/A' }}</td>
                            <td class="text-wrap">{{ $deal->notes ?? 'N/A' }}</td>
                            <td>{{ $deal->closing_date ? $deal->closing_date : 'N/A' }}</td>
                            <td>{{ Str::title($deal->user->name) ?? 'N/A' }}</td>
                            <td>{{ $deal->stage }}</td>
                            <td>
                                <a href="{{ route('admin.deals.show', $deal->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.deals.destroy', $deal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No deals available</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
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