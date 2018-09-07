<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name') }} - @yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('admin/dashboard') }}">{{ config('app.name') }}</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="javascript:void(0)" onclick="getElementById('signoutForm').submit()">Sign out</a>
        <form id="signoutForm" method="post" action="{{ url('logout') }}">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link
              {{ request()->segment(1) == 'admin' && request()->segment(2) == 'dashboard' ? 'active' : '' }}" 
              href="{{ url('admin/dashboard') }}">
                <i class="fa fa-dashboard"></i>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link
              {{ request()->segment(1) == 'admin' && request()->segment(2) == 'order' ? 'active' : '' }}" 
              href="{{ url('admin/order') }}">
                <i class="fa fa-shopping-cart"></i>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link
              {{ request()->segment(1) == 'admin' && request()->segment(2) == 'product' ? 'active' : '' }}" 
              href="{{ url('admin/product') }}">
                <i class="fa fa-shopping-bag"></i>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">@yield('title')</h1>
        </div>

        @yield('content')
      </main>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>
