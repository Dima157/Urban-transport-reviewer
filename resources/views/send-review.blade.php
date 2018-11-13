@include('app')
<div id="review">
    <form action="{{ route('save_review') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <lable>Problems: </lable><select name="problem" id="problem">
            @foreach($problems as $problem)
                <option value="{{ $problem->id }}">{{ $problem->problem }}</option>
            @endforeach
        </select> <br>
        <lable>Cities: </lable><select name="city" id="city" v-model="city" @change='getTransport'>
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