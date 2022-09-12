@extends('master')
@section('content')

    <form action="{{ route('result') }}" method="GET">
        <table>
            <tr>
                <td>
                    <label for="lat">Latitude</label>
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat"><br>
                    <span id="valid">@error('lat'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lng">Longitude</label>
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng"><br>
                    <span id="valid">@error('lng'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="from">From</label>
                </td>
                <td>
                    <input type="date" class="form-control" placeholder="From" name="from" id="from"><br>
                    <span id="valid">@error('from'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="to">To</label>
                </td>
                <td>
                    <input type="date" class="form-control" placeholder="To" name="to" id="to"><br>
                    <span id="valid">@error('to'){{ $message }}@enderror</span>
                </td>
            </tr>
        </table>
        <!-- map div -->
        <div id="map" class="my-3"></div>


        <script>
            let map;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {lat: 24.72733180627361, lng: 46.716959660534684},
                    zoom: 8,
                    scrollwheel: true,
                });

                const uluru = {lat: -34.397, lng: 150.644};
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true
                });

                google.maps.event.addListener(marker, 'position_changed',
                    function () {
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        $('#lat').val(lat)
                        $('#lng').val(lng)
                    })

                google.maps.event.addListener(map, 'click',
                    function (event) {
                        pos = event.latLng
                        marker.setPosition(pos)
                    })
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGWbBgTGULtu1-GQZAoWwCsVhN_V2fmPg&callback=initMap"
                type="text/javascript"></script>
        <!-- submit button -->
        <input type="submit" value="Send" class="btn btn-primary" id="submit">
    </form>
@endsection
