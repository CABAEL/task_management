<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Mark Valles">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{env('APP_NAME')}}</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!--dataTables-->
    <link href="{{asset('assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
</head>