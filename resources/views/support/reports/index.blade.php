@extends('masterpage')
@section('title', 'Support Reports')
@section('css')

@endsection

@section('content')

    <div class="main-panel">
    <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                        </div>
                        <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Reports</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Daily data based on sales with charts layouts!</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Line chart</h4>
                    <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                    <a href="{{route('support.reports.customer-interactions')}}" class="btn btn-info btn-lg">Customers Interactions</a>
                </div>
                </div>
                <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Details</h4>
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th> Customer </th>
                                  <th> Total Interactions </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($interactions   as $interaction)
                                    <tr>
                                    <td>{{Str::title($interaction->customer->first_name.' '.$interaction->customer->last_name)}}</td>
                                    <td> {{ $interaction->total_interactions }} </td>
                                    </tr>
                                    
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

<!-- plugins:js -->
{{-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> --}}
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = @json($dates);
        const data = @json($counts);

        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Interactions Over Time',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<!-- End custom js for this page -->
@endsection