
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
            <h2>Map</h2>
            <div id="map"></div>
        </div>
    
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>

            var map = L.map('map').setView([11.550766, 104.883021], 13);
    

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
   
            L.marker([11.550766, 104.883021]).addTo(map)
                .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                .openPopup();
        </script>
    </body>
    </html>
 
</x-app-layout>

