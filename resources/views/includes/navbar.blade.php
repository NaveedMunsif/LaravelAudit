<style>
    .nanavbar-brand{
        color: white;
    }
</style>
<nav class="navbar navbar-expand p-0">
    <a class="nanavbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="{{ url('/') }}">
        <img src="{{asset('assets/akhuwat-logo.png')}}" alt="logo" width="60px">         Akhuwat</a>
    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button">
        <span class="oi oi-menu"></span>
    </button>
    <!-- Left Side Of Navbar -->
    <!-- Right Side Of Navbar -->
    <!-- Authentication Links -->
    @guest
        <ul class="navbar-nav ms-auto text-right">
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        </ul>
    @else
        <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text" placeholder="Search" aria-label="Search">
        <div class="dropdown d-none d-md-block mr-4">
            <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                Report
            </button>
            <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
                <a href="{{route('reports.high_risk_report')}}" class="dropdown-item">High Risk Summary Report</a>
                <a href="{{route('reports.risk_wise_report')}}" class="dropdown-item">Risk Wise Report</a>
                <a href="{{route('reports.audit_report_list')}}" class="dropdown-item">Audit Reports</a>
            </div>
        </div>
        <div class="dropdown d-none d-md-block ml-4">
            <img class="d-none d-lg-inline rounded-circle ml-1" width="32px" src="{{asset('assets/azamuddin.jpg')}}" alt="MA"/>
            <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    @endguest
</nav>
