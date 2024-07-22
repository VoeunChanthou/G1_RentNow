<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

        <style>
            #map {
                height: 500px;
                width: 100%;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="container">
            <div id="map"></div>
        </div>

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var map = L.map('map').setView([11.550766, 104.883021], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                fetch('http://127.0.0.1:8000/api/shop/locations')
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(location => {
                            L.marker([location.latitude, location.longitude])
                                .addTo(map)
                                .bindPopup(`<a href="#">${location.name}</a>`)
                                .openPopup();
                        });
                    });
            });
        </script>
    </body>

    </html>


</x-app-layout>