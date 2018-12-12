@include('app')
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
    #review {
        padding: 0 200px 0 200px;
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
<div id="review">
    <form action="{{ route('save_review') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <lable>Cities: </lable><select name="city" class='form-control' id="city" v-model="city" @change='getTransport'>
            <option value='0' selected="selected">Select City</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->cityName }}</option>
            @endforeach
        </select> <br>
        <lable>Transports: </lable>

        <select class='form-control' name="transport">
            <option value='0' >Select Car</option>
            <option v-for='item in transport' :value='item.id'>@{{ item.routeNumber }} - @{{ item.carNumber }}</option>
        </select> <br>
        <lable>Problems: </lable><select name="problem" class='form-control' id="problem">
            @foreach($problems as $problem)
                <option value="{{ $problem->id }}">{{ $problem->problem }}</option>
            @endforeach
        </select> <br>
        <labels>Additional info</labels>
        <textarea id="" cols="30" rows="10" class="form-control" name="textReview"></textarea>
        <label>Address</label>
        <input type="text" id="autocomplete" class='form-control' name="location" onFocus="geolocate()"> <br>
        <input type="text"name="lat" style="display: none;">
        <input type="text"name="lng" style="display: none;">
        <lable>Photos with violations</lable>
        <input type="file"name="violation[]" multiple>
        <lable>Upload car number photo: </lable>
        <input type="file" name="car"> <br>
        <button type="submit">
            Send review
        </button>
    </form>
</div>
<script>

    var app = new Vue({
        el: '#review',
        data: {
            city: 0,
            transport: {}
        },
        methods: {
            getTransport: function () {
                const self = this;
                axios.post('http://urban-transport-reviewer/public/transport', {
                    city_id: this.city
                }).then(function (response) {
                    app.transport = response.data;
                });
            }
        }
    })

</script>


<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        var place_location = place.geometry.location;
        var lat = place_location.lat();
        var lng = place_location.lng();
        $('input[name=lat]').val(lat);
        $('input[name=lng]').val(lng);
        console.log($('input[name=lat]').val());
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaE9HwNereJQvsbohiBx6cDlfvFeZtsho
&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>