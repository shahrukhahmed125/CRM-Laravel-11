@extends('masterpage')
@section('title', 'Sales Dashboard')
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
                <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
              </div>
              <div class="col-5 col-sm-7 col-xl-8 p-0">
                <h4 class="mb-1 mb-sm-0">Welcome {{Str::title($user)}}, to Dashboard</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Accroding to your role you can manipulate this CRM system!</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                <span>
                  <a href="{{route('admin.logout')}}" class="btn btn-outline-light btn-rounded get-started-btn">Log Out</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Customers</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$customers}}</h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                </div>
                <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-account-multiple-outline text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Sales</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$total.'PKR'}}</h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                </div>
                <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Deals</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$deals}}</h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                </div>
                <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-file-chart text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title">Notifications</h4>
              <a href="{{route('admin.notifications')}}" class="text-muted mb-1 small">View all</a>
            </div>
            <div class="preview-list">
              @foreach ($notifications as $data)
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">{{Str::title($data->decoded_data['interaction_type'])}}</h6>
                      <p class="text-muted text-small">{{$data->decoded_data['reminder_at']}}</p>
                    </div>
                    <p class="text-muted">{{$data->decoded_data['interaction_details']}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Recent Interactions</h4>
              <p class="text-muted mb-1">Your data status</p>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">
                  @foreach ($interaction as $data)
                  <div class="preview-item border-bottom">
                    @if ($data->type == 'call')
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-phone-incoming"></i>
                      </div>
                    </div>
                    @elseif($data->type == 'meeting')
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-clock"></i>
                      </div>
                    </div>
                    @elseif($data->type == 'email')
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-danger">
                        <i class="mdi mdi-email-open"></i>
                      </div>
                    </div>
                    @endif
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">{{Str::title($data->customer->first_name.' '.$data->customer->last_name)}}</h6>
                        <p class="text-muted mb-0">{{$data->details}}</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-3 pt-sm-0">
                        <p class="text-muted">{{Str::title($data->user->name)}}</p>
                        <p class="text-muted mb-0">{{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
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
            <a href="{{route('admin.reports.customer-interactions')}}" class="btn btn-info btn-lg">Customers Interactions</a>
        </div>
      </div>
      <div class="col-md-12 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To do list</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="enter task..">
              <button class="add btn btn-primary todo-list-add-btn">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Create invoice </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Latest Customers</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Client Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Company </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customer as $client)
                    <tr>
                      <td>
                        <span class="pl-2">{{Str::title($client->first_name. ' '.$client->last_name)}}</span>
                      </td>
                      <td> {{$client->email}} </td>
                      <td> {{$client->phone}} </td>
                      <td> {{$client->company}} </td>
                      <td>
                        @if (strtolower($client->status) == 'active')
                            <div class="badge badge-outline-success">Active</div>
                        @else
                            <div class="badge badge-outline-danger">Not Active</div>
                        @endif
                    </td>
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
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
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



@endsection