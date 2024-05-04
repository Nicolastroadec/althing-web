// Coordonnées pour localiser la carte sur la Bretagne

// Créer la carte avec OpenStreetMap comme fournisseur de tuiles

let bretagneCoordinates = [48.2020, -2.9326];

let properties = {
    minZoom: 8,
    maxZoom: 12,
};

// let map01 = L.map('map01', properties).setView(bretagneCoordinates, 8);

let map11 = L.map('map11', properties).setView(bretagneCoordinates, 8);
let map12 = L.map('map12', properties).setView(bretagneCoordinates, 8);

let map = L.map('map', properties).setView(bretagneCoordinates, 8);
let map2 = L.map('map2', properties).setView(bretagneCoordinates, 8);
let map22 = L.map('map22', properties).setView(bretagneCoordinates, 8);
let map23 = L.map('map23', properties).setView(bretagneCoordinates, 8);
/* let map24 = L.map('map24', properties).setView(bretagneCoordinates, 8);
 */let map25 = L.map('map25', properties).setView(bretagneCoordinates, 8);
let map26 = L.map('map26', properties).setView(bretagneCoordinates, 8);
let map27 = L.map('map27', properties).setView(bretagneCoordinates, 8);



let map3 = L.map('map3', properties).setView(bretagneCoordinates, 8);
let map4 = L.map('map4', properties).setView(bretagneCoordinates, 8);
let map5 = L.map('map5', properties).setView(bretagneCoordinates, 8);
let map6 = L.map('map6', properties).setView(bretagneCoordinates, 8);
let map7 = L.map('map7', properties).setView(bretagneCoordinates, 8);
let map8 = L.map('map8', properties).setView(bretagneCoordinates, 8);
let map9 = L.map('map9', properties).setView(bretagneCoordinates, 8);
let map10 = L.map('map10', properties).setView(bretagneCoordinates, 8);
// Utiliser les tuiles OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map11);

L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map12);

L.tileLayer('https://api.mapbox.com/styles/v1/nicolastroadec/clu10mdy400nu01qwgizt8el8/tiles/512/{z}/{x}/{y}?access_token=pk.eyJ1Ijoibmljb2xhc3Ryb2FkZWMiLCJhIjoiY2x1MTBrOTR5MGV5eDJsbjBrdGRrcWNyNyJ9.7m60Z52KxMHCajM-fbksNw', {
    attribution: '© Mapbox'
}).addTo(map);


L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map2);
L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map22);

L.tileLayer('http://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map23);

/* L.tileLayer('https://cartocdn_{s}.global.ssl.fastly.net/base-antique/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map24);
 */
L.tileLayer('https://cartocdn_{s}.global.ssl.fastly.net/base-antique/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map25);

L.tileLayer('https://cartocdn_{s}.global.ssl.fastly.net/base-flatblue/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map26);
L.tileLayer('https://cartocdn_{s}.global.ssl.fastly.net/base-midnight/{z}/{x}/{y}.png', {
    attribution: '© CARTO'
}).addTo(map27);



// arcgisonline.com

L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Terrain_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: '© Esri'
}).addTo(map3);

// 150k requêtes par mois -> gratuit. Sinon 95 dollars

L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map4);


L.tileLayer('https://{s}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map5);

L.tileLayer('https://{s}.tile.thunderforest.com/transport-dark/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map6);


L.tileLayer('https://{s}.tile.thunderforest.com/pioneer/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map7);

L.tileLayer('https://{s}.tile.thunderforest.com/mobile-atlas/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map8);


L.tileLayer('https://{s}.tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map9);


L.tileLayer('https://{s}.tile.thunderforest.com/atlas/{z}/{x}/{y}.png?apikey=f9ca54ba5a4b46608b76a81c5e910be3', {
    attribution: '&copy; Thunderforest'
}).addTo(map10);





// Coordonnées pour Rennes et Brest
let rennesCoordinates = [48.1173, -1.6778];
let brestCoordinates = [48.3904, -4.4860];

// Définir l'icône personnalisée
let customIcon = L.icon({
    iconUrl: 'https://mobin.nicolastroadec.fr/wp-content/themes/mobin/assets/img/bicyclette.png',
    iconSize: [38, 38], // Taille de l'icône en pixels
    iconAnchor: [19, 38], // Point d'ancrage de l'icône, correspondant au centre de l'image
    popupAnchor: [0, -38] // Point d'ancrage du popup par rapport à l'icône
});

// Créer le marqueur en utilisant l'icône personnalisée


// add these coordinates to each map above 

let rennes = '<b><img src="https://mobin.nicolastroadec.fr/wp-content/themes/mobin/assets/img/bicyclette.png" alt="bicyclette" width="20" height="20">Rennes</b><br>Population : 215 000<br>Adhérents : 350';
let brest = '<b>Brest</b><br>Population : 139 000<br>Adhérents : 220<br><a class="btn">En savoir plus</a>';

let maps = [map, map2, map22, map23, map25, map3, map4, map5, map6, map7, map8, map9, map10, map11, map12];


const departements = [
    {
        departement: '22',
        url: 'https://france-geojson.gregoiredavid.fr/repo/departements/22-cotes-d-armor/departement-22-cotes-d-armor.geojson',
    },
    {
        departement: '29',
        url: 'https://france-geojson.gregoiredavid.fr/repo/departements/29-finistere/departement-29-finistere.geojson',
    },
    {
        departement: '35',
        url: 'https://france-geojson.gregoiredavid.fr/repo/departements/35-ille-et-vilaine/departement-35-ille-et-vilaine.geojson',
    },
    {
        departement: '56',
        url: 'https://france-geojson.gregoiredavid.fr/repo/departements/56-morbihan/departement-56-morbihan.geojson',
    },
];

let departementsGeoJson = []

departements.forEach(departement => {
    fetch(departement.url)
        .then(response => response.json())
        .then(data => {
            departementsGeoJson.push(data);
            addGeoJsonToMap();
        });
    // Ajouter une fonction pour afficher le nom du Departement
})

function addGeoJsonToMap() {
    departementsGeoJson.forEach(data => {
        maps.forEach(map => {
            var departementLayer = L.geoJSON(data, {
                // Ajouter du style au texte du nom du département
                style: function (feature) {
                    return {
                        color: '#454545',
                        fillColor: 'white',
                        weight: 1,
                        fillOpacity: 0,
                    };
                },
                // Ajouter une fonction pour afficher le nom du département
                onEachFeature: function (feature, layer) {
                    var bounds = layer.getBounds();
                    var center = bounds.getCenter();
                    var nomDepartement = feature.properties.nom;

                    // Créer un div pour afficher le nom du département
                    var label = L.divIcon({
                        className: 'label',
                        html: '<div class="departement">' + nomDepartement + '</div>',
                        iconSize: [100, 40]
                    });

                    // Ajouter une étiquette au centre du département
                    L.marker(center, {
                        icon: label
                    }).addTo(map);
                }
            }).addTo(map);

            L.marker(rennesCoordinates).addTo(map).bindPopup(rennes);
            L.marker(brestCoordinates).addTo(map).bindPopup(brest);

            // Écouter les événements de zoom de la carte

        })

    })
}

// Créer un calque GeoJSON et l'ajouter à la carte
