<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alt concept</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>

    <link href="https://bootswatch.com/simplex/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/ladda-themeless.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    <link href="/css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
    <link href="/css/dragula.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header pull-left">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#resonsive-menu">
                <span class="sr-only">Открыть меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                <img class="img-responsive imgl" src="/images/logos/alt-logo.png"/>
            </a>
        </div>
        <ul class="nav navbar-nav collapse navbar-collapse" id="resonsive-menu">
            <li class="active"><a href="/">Найти референцию</a></li>
            <li><a href="/create">Добавить проект</a></li>
        </ul>
        @if(isset($path))
            @if($path == '/')
                <button class="btn btn-primary btn-sm navbar-btn pull-right handle" type="button">Отобранные&nbsp;
                    <span id="amountReferences"
                          class="badge">{{ isset($userReferences) ? count($userReferences) : 0 }}</span>
                </button>
            @endif
        @endif
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            @yield('content')

        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="/js/datepicker-ru.js"></script>
<script src="/js/spin.min.js"></script>
<script src="/js/ladda.min.js"></script>
<script src="/js/tag-it.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="/js/dragula.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery.slidereveal.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/clipboard.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>