window.addEventListener('load', function(){
    const estadios = [
    { href: "https://www.atleticodemadrid.com/civitasmetropolitano", src: "img/metropolitano.jpg", alt: "Estadio Civitas Metropolitano", nombre: "Estadio Civitas Metropolitano" },
    { href: "https://www.fcbarcelona.es/es/club/instalaciones/spotify-camp-nou", src: "img/campnou.jpg", alt: "Estadio Spotify Camp Nou", nombre: "Estadio Spotify Camp Nou" },
    { href: "https://www.elchecf.es/estadio", src: "img/valero.jpg", alt: "Estadio Martinez Valero", nombre: "Estadio Martinez Valero" },
    { href: "https://www.realbetisbalompie.es/club/estadio-benito-villamarin/", src: "img/villamarin.jpg", alt: "Estadio Benito Villamarin", nombre: "Estadio Benito Villamarin" },
    { href: "https://www.estadiolacartuja.es/", src: "img/cartuja.jpeg", alt: "Estadio La Cartuja", nombre: "Estadio La Cartuja" },
    { href: "https://sanmames.athletic-club.eus/", src: "img/sanmames.jpg", alt: "Estadio San Mames", nombre: "Estadio San Mames" },
    { href: "https://www.valenciacf.com/mestalla", src: "img/mestalla.jpg", alt: "Estadio de Mestalla", nombre: "Estadio de Mestalla" },
    { href: "https://sevillafc.es/el-club/ramon-sanchez-pizjuan", src: "img/pijuan.jpg", alt: "Estadio Ramon Sanchez Pizjuan", nombre: "Estadio Ramon Sanchez Pizjuan" },
    { href: "https://www.realsociedad.eus/es/club/instalaciones", src: "img/reale.jpg", alt: "Estadio Reale Arena", nombre: "Estadio Reale Arena" },
    { href: "https://www.realzaragoza.com/la-romareda", src: "img/romareda.jpg", alt: "Estadio La Romareda", nombre: "Estadio La Romareda" },
    { href: "https://www.rcdeportivo.es/abanca-riazor", src: "img/riazor.jpg", alt: "Estadio Riazor", nombre: "Estadio Riazor" },
    { href: "https://www.udlaspalmas.es/estadio", src: "img/grancanaria.jpg", alt: "Estadio Gran Canaria", nombre: "Estadio Gran Canaria" },
    { href: "https://www.realoviedo.es/estadio-carlos-tartiere", src: "img/tartiere.jpg", alt: "Estadio Carlos Tartiere", nombre: "Estadio Carlos Tartiere" },
    { href: "https://www.malagacf.com/estadio-la-rosaleda", src: "img/rosaleda.jpg", alt: "Estadio La Rosaleda", nombre: "Estadio La Rosaleda" },
    { href: "https://www.realsporting.com/molinon-tour", src: "img/molinon.jpg", alt: "Estadio El Molinon", nombre: "Estadio El Molinon" },
    { href: "https://www.wembleystadium.com/", src: "img/wembley.jpg", alt: "Wembley", nombre: "Wembley" },
    { href: "https://www.manutd.com/en/visit-old-trafford", src: "img/oldTrafford.jpg", alt: "Old Trafford", nombre: "Old Trafford" },
    { href: "https://www.tottenhamhotspur.com/the-stadium/", src: "img/tottenhamHotspurStadium.jpg", alt: "Tottenham Hotspur Stadium", nombre: "Tottenham Hotspur Stadium" },
    { href: "https://www.arsenal.com/the-club/emirates-stadium", src: "img/emirates.jpg", alt: "Emirates Stadium", nombre: "Emirates Stadium" },
    { href: "https://www.londres.es/estadio-olimpico-londres", src: "img/olimpicolondres.jpg", alt: "Olimpyc London Stadium", nombre: "Olimpyc London Stadium" },
    { href: "https://www.mancity.com/etihad-stadium", src: "img/etihad.jpg", alt: "Etihad Stadium", nombre: "Etihad Stadium" },
    { href: "https://www.liverpoolfc.com/info/anfield", src: "img/anfield.jpg", alt: "Anfield", nombre: "Anfield" },
    { href: "https://www.newcastleunited.com/stadium/", src: "img/jamespark.jpg", alt: "St James Park", nombre: "St James Park" },
    { href: "https://www.avfc.co.uk/villa-park/", src: "img/villapark.jpg", alt: "Villa Park", nombre: "Villa Park" },
    { href: "https://www.chelseafc.com/en/stadium-tours-and-museum", src: "img/stamford.jpg", alt: "Stamford Bridge", nombre: "Stamford Bridge" },
    { href: "https://www.inter.it/en/club/stadium", src: "img/giussepe.jpg", alt: "Estadio Giuseppe Meazza", nombre: "Estadio Giuseppe Meazza" },
    { href: "https://www.acmilan.com/en/club/venues/san-siro", src: "img/giussepe.jpg", alt: "San Siro", nombre: "San Siro" },
    { href: "https://www.asroma.com/en/stadium", src: "img/estadioolimpico.jpg", alt: "Stadio Olimpico de Roma", nombre: "Stadio Olimpico de Roma" },
    { href: "https://www.sslazio.it/it/biglietteria/stadio-e-regolamenti", src: "img/estadioolimpico.jpg", alt: "Stadio Olimpico de Roma", nombre: "Stadio Olimpico de Roma" },
    { href: "https://www.sscalciobari.it/it/page/22-regolamento-duso/", src: "img/sannicola.jpg", alt: "Stadio San Nicola", nombre: "Stadio San Nicola" },
    { href: "https://sscnapoli.it/il-club-calcio-napoli-s-p-a/", src: "img/StadioMaradona.jpg", alt: "Stadio Diego Armando Maradona", nombre: "Stadio Diego Armando Maradona" },
    { href: "https://www.acffiorentina.com/en/tickets/stadio-franchi", src: "img/armeniofranchi.jpg", alt: "Stadio Armenio Franchi", nombre: "Stadio Armenio Franchi" },
    { href: "https://www.juventus.com/en/allianz-stadium/", src: "img/juventusStadium.jpg", alt: "Juventus Stadium", nombre: "Juventus Stadium" },
    { href: "https://www.ticket-onlineshop.com/ols/bvbstadion/", src: "img/signal.jpg", alt: "Signal Iduna Park", nombre: "Signal Iduna Park" },
    { href: "https://fcbayern.com/museum/es", src: "img/allianz.jpg", alt: "Allianz Arena", nombre: "Allianz Arena" },
    { href: "https://www.bundesliga.com/es/bundesliga/noticias/olympiastadion-estadio-hertha-berlin-alemania-6042", src: "img/berlin.jpg", alt: "Estadio Olimpico de Berlin", nombre: "Estadio Olimpico de Berlin" },
    { href: "https://schalke04.de/en/the-veltins-arena/the-veltins-arena-2/", src: "img/veltins.jpg", alt: "Veltins Arena", nombre: "Veltins Arena" },
    { href: "https://www.mhparena-stuttgart.de/", src: "img/mhparena.jpg", alt: "Mercedes Benz Arena", nombre: "Mercedes Benz Arena" },
    { href: "https://www.borussia.de/es/club/destino-borussia-park", src: "img/borrusiapark.jpg", alt: "Borussia Park", nombre: "Borussia Park" },
    { href: "https://www.deutschebankpark.de/", src: "img/eintracht.jpg", alt: "Commerzbank Arena", nombre: "Commerzbank Arena" }
];

const estadiosContenedor = document.getElementById('estadios');

estadios.forEach(estadio => {
    const div = document.createElement('div');
    div.className = 'estadio';

    const a = document.createElement('a');
    a.href = estadio.href;
    a.target = "_blank";

    const img = document.createElement('img');
    img.src = estadio.src;
    img.alt = estadio.alt;

    const h3 = document.createElement('h3');
    h3.textContent = estadio.nombre;

    const button = document.createElement('button');
    button.textContent = "Seleccionar";

    a.appendChild(img);
    div.appendChild(a);
    div.appendChild(h3);
    div.appendChild(button);
    estadiosContenedor.appendChild(div);
});
})