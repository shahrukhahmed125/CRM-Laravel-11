<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav w-100">
            @if (Request::routeIs('admin.customerData') || Request::routeIs('admin.customerSearch') || Request::routeIs('sales.customerData') || Request::routeIs('sales.customerSearch') || Request::routeIs('support.customerData') || Request::routeIs('support.customerSearch'))
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="
                @if (Auth::user()->role == 'admin')
                  {{route('admin.customerSearch')}}
                @elseif (Auth::user()->role == 'sales')
                  {{route('sales.customerSearch')}}
                @elseif (Auth::user()->role == 'support')
                  {{route('support.customerSearch')}}
                @endif" method="GET">
                  <input type="text" class="form-control" placeholder="Search Customers" name="query" value="{{request()->input('query')}}">
                  <button type="submit" class="btn btn-success">Search</button>
                </form>
              </li>
            @endif
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" style="@if(Auth::user()->role == 'user') pointer-events: none; @endif">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/face15.jpg')}}" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Str::title(Auth::user()->name)}}</p>
                  @if (Auth::user()->role != 'user')
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  @endif
                </div>
              </a>
              @if (Auth::user()->role != 'user')
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Options</h6>
                  <div class="dropdown-divider"></div>
                  @if (Auth::user()->role == 'support')
                  <a class="dropdown-item preview-item" href="#">
                  @elseif (Auth::user()->role == 'admin')
                  <a class="dropdown-item preview-item" href="{{route('admin.profile')}}">
                  @elseif (Auth::user()->role == 'sales')
                  <a class="dropdown-item preview-item" href="#">
                  @endif
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-account-circle text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Profile</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  @if (Auth::user()->role == 'support')
                  <a class="dropdown-item preview-item" href="{{route('suport.changePassword')}}">
                  @elseif (Auth::user()->role == 'admin')
                  <a class="dropdown-item preview-item" href="{{route('admin.changePassword')}}">
                  @elseif (Auth::user()->role == 'sales')
                  <a class="dropdown-item preview-item" href="{{route('sales.changePassword')}}">
                  @endif
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-information-outline text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Change Password</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  @if (Auth::user()->role == 'admin')
                  <a class="dropdown-item preview-item" href="{{route('admin.logout')}}">
                  @elseif (Auth::user()->role =='sales')
                  <a class="dropdown-item preview-item" href="{{route('sales.logout')}}">
                  @elseif (Auth::user()->role =='support')
                  <a class="dropdown-item preview-item" href="{{route('support.logout')}}">
                  @endif
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
                
              @endif
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
</div>