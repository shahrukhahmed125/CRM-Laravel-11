<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/crm_nav.png')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{asset('assets/images/faces/face15.jpg')}}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal text-wrap">{{Str::title(Auth::user()->name)}}</h5>
                  <span>{{Str::title(Auth::user()->role)}}</span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="
            @if (Auth::user()->role == 'admin')
              {{route('admin.dashboard')}}
            @elseif (Auth::user()->role == 'sales')
              {{route('sales.dashboard')}}
            @elseif (Auth::user()->role == 'support')
              {{route('support.dashboard')}}
            @else
              {{route('guest.dashboard')}}
            @endif
            ">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if (Auth::user()->role != 'user')
            @if (Auth::user()->role == 'admin')
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-multiple"></i>
                  </span>
                  <span class="menu-title">Users</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.addUserData')}}">Add User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.userData')}}">All Users</a></li>
                  </ul>
                </div>
              </li>          
            @endif
            <li class="nav-item menu-items">
              <a class="nav-link" href="
              @if (Auth::user()->role == 'admin')
                {{route('admin.customerData')}}
              @elseif (Auth::user()->role == 'sales')
                {{route('sales.customerData')}}
              @elseif (Auth::user()->role == 'support')
                {{route('support.customerData')}}
              @endif
              ">
                <span class="menu-icon">
                  <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">Customer List</span>
              </a>
            </li>
            @if (Auth::user()->role == 'admin')
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.addCustomerData')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-multiple-plus"></i>
                  </span>
                  <span class="menu-title">Add Customer</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.interactions.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-lan"></i>
                  </span>
                  <span class="menu-title">Interactions</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.interactions.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-phone-log"></i>
                  </span>
                  <span class="menu-title">Log Interactions</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.pipelines.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Pipelines</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.pipelines.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Add Pipelines</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.deals.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Deals</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.deals.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Add Deals</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.reports.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                  </span>
                  <span class="menu-title">Reports</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.notifications')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-bell"></i>
                  </span>
                  <span class="menu-title">Notifications</span>
                </a>
              </li>
            @elseif (Auth::user()->role == 'sales')
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.interactions.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-lan"></i>
                  </span>
                  <span class="menu-title">Interactions</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.addCustomerData')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-multiple-plus"></i>
                  </span>
                  <span class="menu-title">Add Customer</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.pipelines.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Pipelines</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.pipelines.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Add Pipelines</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.interactions.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-phone-log"></i>
                  </span>
                  <span class="menu-title">Log Interactions</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.deals.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Deals</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.deals.create')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Add Deals</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.reports.index')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                  </span>
                  <span class="menu-title">Reports</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('sales.notifications')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-bell"></i>
                  </span>
                  <span class="menu-title">Notifications</span>
                </a>
              </li>
            @elseif (Auth::user()->role == 'support')
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{route('support.interactions.index')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-lan"></i>
                </span>
                <span class="menu-title">Interactions</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{route('support.interactions.create')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-phone-log"></i>
                </span>
                <span class="menu-title">Log Interactions</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{route('support.pipelines.index')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Pipelines</span>
              </a>
            </li>
            @endif
          @endif
        

        </ul>
      </nav>
</div>