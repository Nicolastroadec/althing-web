    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <div class="internal-section-width">

        <h2>0 - MapBox</h2><br><br>

        <div id="map" style="width: 1000px; height: 500px;"></div>
    </div>



    <script>
        const mapCenter = [-2.8808, 48.1227];
        const mapZoom = 6.5;

        // Créer une instance de la carte Leaflet
        const map = L.map('map', {
            center: mapCenter,
            zoom: mapZoom
        });

        // URL de l'image Mapbox
        const imageUrl = 'https://api.mapbox.com/styles/v1/mapbox/light-v11/static/-2.8808,48.1227,6.5,0/1000x500?access_token=pk.eyJ1Ijoibmljb2xhc3Ryb2FkZWMiLCJhIjoiY2x1MTBrOTR5MGV5eDJsbjBrdGRrcWNyNyJ9.7m60Z52KxMHCajM-fbksNw';

        // Calculer les limites de la carte en fonction du centre et du zoom
        const mapBounds = map.getBounds();

        // Calculer les limites de l'image en fonction des limites de la carte et des dimensions de l'image
        const imageBounds = [
            [
                mapBounds.getNorth() - ((mapBounds.getNorth() - mapBounds.getSouth()) / 2),
                mapBounds.getWest() - ((mapBounds.getEast() - mapBounds.getWest()) / 2)
            ],
            [
                mapBounds.getNorth() + ((mapBounds.getNorth() - mapBounds.getSouth()) / 2),
                mapBounds.getWest() + ((mapBounds.getEast() - mapBounds.getWest()) / 2)
            ]
        ];

        // Ajouter la couche d'image à la carte Leaflet
        const imageLayer = L.imageOverlay(imageUrl, imageBounds);
        imageLayer.addTo(map);


        const rennesCoordinates = [48.1173, -1.6778];
        const brestCoordinates = [48.3904, -4.4860];

        L.marker(rennesCoordinates).addTo(map).bindPopup('Rennes');
        L.marker(brestCoordinates).addTo(map).bindPopup('Brest');
    </script>