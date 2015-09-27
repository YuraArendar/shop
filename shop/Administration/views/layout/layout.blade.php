<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="{{ LaravelLocalization::getCurrentLocale() }}">
    <title>{{ @$title }}</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    @include('administration::layout.styles')

    <!-- Head Libs -->
    <script src="/assets/cms/vendor/modernizr/modernizr.js"></script>

</head>

<body >
<section class="body" onload="{!! @$onLoad !!}" >
    <!-- start: header -->
        @include('administration::layout.header')
    <!-- end: header -->
    <!-- modal dialog templates:  -->
    @include('administration::layout.inc.modals')
    <!-- end:modal dialog templates  -->
    <div class="inner-wrapper">

        {!! $menu !!}

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>{{ $partition }}</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Layouts</span></li>
                        <li><span>Default</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>
            @include('administration::layout.inc.lang_filelds')

            <!-- start: page -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">

                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title"> {{ @$title }} </h2>
                        </header>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </section>
                </div>
            </div>



            <!-- end: page -->
        </section>
    </div>

    <!-- start: sidebar-right -->
        @include('administration::layout.sidebar_right')
    <!-- end: sidebar-right -->
    @include('administration::layout.scripts')
    <script>
        $(document).ready(function(){
            {!! @$onLoad !!}
        });
    </script>

</section>
</body>
</html>