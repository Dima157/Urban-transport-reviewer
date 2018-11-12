
<?php ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/plain; charset=UTF-8" />
</head>
<body>
<table>
    <thead>
    <tr>
        <td>City</td>
        <td>Problem</td>
        <td>Transport</td>
        <td>Carrier</td>
        <td>Date</td>
        <td>Time</td>
    </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->city->cityName }}</td>
                <td>{{ $review->problem->problem }}</td>
                <td>{{ $review->transport->routeNumber }}</td>
                <td>{{ $review->transport->carrier->carrierName }} {{ $review->transport->carrier->carrierSurname }}</td>
                <td>{{ $review->dateReview }}</td>
                <td>{{ $review->timeReview }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>