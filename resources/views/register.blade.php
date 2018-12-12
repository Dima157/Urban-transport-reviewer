<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<style>
    html {
        text-align: center;
    }
    .btn-facebook {
        background: #3B5998;
        border-radius: 0;
        color: #fff;
        border-width: 1px;
        border-style: solid;
        border-color: #263961;
    }
    .input_form {
        width: 200px;
    }
    .btn-facebook:link, .btn-facebook:visited {
        color: #fff;
    }
    .btn-facebook:active, .btn-facebook:hover {
        background: #263961;
        color: #fff;
    }
    #wrapper{
        padding: 0 540px 0 510px;
    }
    .btn_reg {
        width: 100%;
    }
</style>
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
<div id="wrapper">
    <form action="{{ route('register') }}">
        <p>Name</p>
        <input type="text"name="name" class="form-control"> <br>
        <p>Surname</p>
        <input type="text"name="surname"class="form-control"> <br>
        <p>Email</p>
        <input type="email"name="email"class="form-control"> <br>
        <p>Password</p>
        <input type="password"name="password"class="form-control"> <br>
        <p>Password repeat</p>
        <input type="password"name="repeat_pass"class="form-control"> <br>
        <input type="submit" class="btn btn-default btn_reg" value="Register">
    </form>
    <a href="{{ $url }}" title="Facebook" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-fw"></i> SignUp with facebook</a>
</div>