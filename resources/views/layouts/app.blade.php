<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

</head>


<body class="fix-header">
<div id="app">
<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="page-title">{{ @$pageTitle }}</h4> </div>
        {{--  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ URL::previous() }}">Course</a></li>
                <li class="active">{{ @$pageTitle }}</li>
            </ol>
        </div>  --}}

        </div>
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>
