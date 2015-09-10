<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('/')}}/libraries/theme/bootstrap.css">
    <script src="{{URL::to('/')}}/libraries/theme/jquery.js"></script>
    <script src="{{URL::to('/')}}/libraries/theme/bootstrap.js"></script>
    @yield('head')
</head>
<body>
@if(Auth::check())
    @if(Auth::user()->privilege == 1)
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href={{URL::to('/')}}>{{\App\CompanyInfo::where('id','=',1)->pluck('name')}}</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="{{URL::to('dashboard')}}">Dashboard</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{URL::to('add-job-category')}}">Job Category</a></li>
                                <li><a href="{{URL::to('add-job-type')}}">Job Type</a></li>
                                <li><a href="{{URL::to('add-pay-type')}}">Pay Type</a></li>
                                <li><a href="{{URL::to('add-listing')}}">Add Job Listing</a></li>
                                <li><a href="{{URL::to('my-listings')}}">My Job Listing</a></li>
                                <li><a href="{{URL::to('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
@endif
@yield('body')
</body>
</html>