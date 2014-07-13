<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Freediving.Ninja</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div class="row">
    <div class="columns large-12">
        @yield('content')
    </div>
</div>

<link rel="stylesheet" href="/css/app.min.css" />
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-10817444-26', 'freediving.ninja');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script async src="/js/build/app.js"></script>
<script>
    $('#email').on('keyup', function(){
        if($.trim($(this).val()).length > 0){
            $('.optional').fadeIn('slow');
        }
    });
</script>
</body>
</html>
