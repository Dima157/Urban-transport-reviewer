<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-default">
        <!-- Контейнер (определяет ширину Navbar) -->
        <div class="container-fluid">
            <!-- Заголовок -->
            <div class="navbar-header">
                <!-- Кнопка «Гамбургер» отображается только в мобильном виде (предназначена для открытия основного содержимого Navbar) -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Бренд или название сайта (отображается в левой части меню) -->
                <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                <a class="navbar-brand" href="{{ route('reviews') }}">Reviews</a>
                <a class="navbar-brand" href="{{ route('register-form') }}">SignUp</a>
                <a class="navbar-brand" href="{{ route('login_form') }}">SignIn</a>
            </div>
            <!-- Основная часть меню (может содержать ссылки, формы и другие элементы) -->
            <div class="collapse navbar-collapse" id="navbar-main">
                <!-- Содержимое основной части -->
            </div>
        </div>
    </nav>

    <iframe src="http://zt.rozklad.in.ua/home/index#list" width="100%" height="500" frameborder="1" style=""></iframe>
    </body>
</html>
