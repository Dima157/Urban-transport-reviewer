<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<style>
    .btn-facebook {
        background: #3B5998;
        border-radius: 0;
        color: #fff;
        border-width: 1px;
        border-style: solid;
        border-color: #263961;
    }
    .pagin {
        text-align: center;
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
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    #map {
        height: 50%;
        width: 100%;
    }
    #map_wrapper {
        margin-top: 10px;
        padding: 0 30px 0 30px;
     }
    /* Optional: Makes the sample page fill the window. */
    html, body {

        height: 100%;
        margin: 0;
        padding: 0;
    }
    .data_wrapper{
        margin-top: 20px;
        padding-left: 40px;
    }
    li {
        list-style: none;
    }
    .review {
        width: 500px;
        margin: 10px 0 10px 0;
        border-top:1px solid darkgray;
        border-bottom:1px solid darkgray;
    }
</style>
<div id="map_wrapper">
    <div id="map"></div>
</div>

<div class="data_wrapper">
    {{--<div id="allData">Get graphic</div>--}}
    <button type="button" class="btn btn-secondary">Get graphic</button>
    <div class="data_by_date">
        {{--<div id="allByDate"class="">Get graphic by date</div>--}}
        <button type="button" class="btn btn-secondary">Get graphic by date</button>
        From: <input type="date"name="date_start" class="input_form">
        To: <input type="date"name="date_end" class="input_form">
    </div>
    <button type="button" class="btn btn-secondary">Export reviews</button>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

    $('#allData').click(function(){
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url: '/get-graphic-all',
           type: 'POST',
           data: "type=all",
           success: function(response) {
               document.location = response;
           }
       })
    });


    $('#allByDate').click(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-graphic-all',
            type: 'POST',
            data: "type=date",
            success: function(response) {
                document.location = response;
            }
        })
    });

    function initMap() {
        var uluru = {lat: 50.263399, lng: 28.663641};
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 12, center: uluru});
        addMarkers(map);
    }

    function addMarkers(map)
    {
        var p = getPageId();
        console.log(p);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-markers',
            type: 'POST',
            data: "p=" + p,
            success: function (response) {
                var data = JSON.parse(response);
                data.forEach(function (marker) {
                    var contentString = "<div><img src='" + marker.images + "'/></div>";
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    var mapMarker = new google.maps.Marker({position: marker.location, map: map});
                    mapMarker.addListener('click', function() {
                        infowindow.open(map, mapMarker);
                    });
                });
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })
    }

    function getPageId() {
        var strGET = window.location.search.replace( '?', '');
        var p = 1;
        if(strGET != '') {
            strGET = strGET.split('=');
            p = strGET[1]
        }
        return p;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl_-VZoClktt0JOdmkKzXIdc3cPPbXO3E&callback=initMap"
        async defer></script>
<div id="wrapper">
    <ul id="reviews">
        @foreach ($reviews as $review)
            <li>
                <div class="review">
                    <div style="margin-bottom: 10px"> Review added at: {{ $review->dateReview }} {{ $review->timeReview }}</div>
                    <div style="margin-bottom: 10px">Type of problems: {{ $review->problem->problem }}</div>
                    <div>Additional info: Test</div>
                    @if(!empty($review->textReview))
                        {{ $review->textReview }}
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    <div class="pagin">
        {{ $reviews->render() }}
    </div>
</div>