let estadioSeleccionado1 = null;
let estadioSeleccionado2 = null;

window.addEventListener('load', function() {
    
    const btnFiltrar = document.getElementById('btnfiltrar');
    btnFiltrar.addEventListener('input', filtrarEstadios);

    function filtrarEstadios() {
        const filtro = normalizeText(btnFiltrar.value.toLowerCase());
        const estadios = document.querySelectorAll('.estadio');

        for (let i = 0; i < estadios.length; i++) {
            const nombreEstadio = normalizeText(estadios[i].querySelector('h3').textContent.toLowerCase());
            const nombreClub = normalizeText(estadios[i].getAttribute('data-club').toLowerCase());
            if (nombreEstadio.includes(filtro) || nombreClub.includes(filtro)) {
                estadios[i].style.display = 'block';
            } else {
                estadios[i].style.display = 'none';
            }
        }
    }

    //funcion para quitar tildes
    function normalizeText(text) {
        return text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    const estadios = [
        { href: "https://www.atleticodemadrid.com/civitasmetropolitano", src: "img/metropolitano.jpg", alt: "Estadio Civitas Metropolitano", nombre: "Estadio Civitas Metropolitano", capacidad: 70000, anoCreacion: 2017, club: "Atlético de Madrid" },
        { href: "https://www.fcbarcelona.es/es/club/instalaciones/spotify-camp-nou", src: "img/campnou.jpg", alt: "Estadio Spotify Camp Nou", nombre: "Estadio Spotify Camp Nou", capacidad: 99999, anoCreacion: 1957, club: "FC Barcelona" },
        { href: "https://www.elchecf.es/estadio", src: "img/valero.jpg", alt: "Estadio Martinez Valero", nombre: "Estadio Martinez Valero", nombre: "Estadio Martinez Valero", capacidad: 31388, anoCreacion: 1976, club: "Elche Club de Futbol"},
        { href: "https://www.realbetisbalompie.es/club/estadio-benito-villamarin/", src: "img/villamarin.jpg", alt: "Estadio Benito Villamarin", nombre: "Estadio Benito Villamarin", capacidad: 60721, anoCreacion: 1929, club: "Real Betis Balompie"},
        { href: "https://www.estadiolacartuja.es/", src: "img/cartuja.jpeg", alt: "Estadio La Cartuja", nombre: "Estadio La Cartuja", capacidad: 57619, anoCreacion: 1999, club: "Seleccion Española de Futbol"},
        { href: "https://sanmames.athletic-club.eus/", src: "img/sanmames.jpg", alt: "Estadio San Mames", nombre: "Estadio San Mames", capacidad: 53331, anoCreacion: 2013, club: "Athletic Club de Bilbao"},
        { href: "https://www.valenciacf.com/mestalla", src: "img/mestalla.jpg", alt: "Estadio de Mestalla", nombre: "Estadio de Mestalla", capacidad: 49430, anoCreacion: 1923, club: "Valencia Club de Futbol"},
        { href: "https://sevillafc.es/el-club/ramon-sanchez-pizjuan", src: "img/pijuan.jpg", alt: "Estadio Ramon Sanchez Pizjuan", nombre: "Estadio Ramon Sanchez Pizjuan", capacidad: 43883, anoCreacion: 1958, club: "Sevilla Futbol Club"},
        { href: "https://www.realsociedad.eus/es/club/instalaciones", src: "img/reale.jpg", alt: "Estadio Reale Arena", nombre: "Estadio Reale Arena", capacidad: 39313, anoCreacion: 1993, club: "Real Sociedad"},
        { href: "https://www.realzaragoza.com/la-romareda", src: "img/romareda.jpg", alt: "Estadio La Romareda", nombre: "Estadio La Romareda", capacidad: 33608, anoCreacion: 1957, club: "Real Zaragoza"},
        { href: "https://www.rcdeportivo.es/abanca-riazor", src: "img/riazor.jpg", alt: "Estadio Riazor", nombre: "Estadio Riazor", capacidad: 32490, anoCreacion: 1944, club: "Real Club Deportivo de la Coruña"},
        { href: "https://www.udlaspalmas.es/estadio", src: "img/grancanaria.jpg", alt: "Estadio Gran Canaria", nombre: "Estadio Gran Canaria", capacidad: 32392, anoCreacion: 2003, club: "Union Deportiva Las Palmas"},
        { href: "https://www.realoviedo.es/estadio-carlos-tartiere", src: "img/tartiere.jpg", alt: "Estadio Carlos Tartiere", nombre: "Estadio Carlos Tartiere", capacidad: 30500, anoCreacion: 2000, club: "Real Oviedo"},
        { href: "https://www.malagacf.com/estadio-la-rosaleda", src: "img/rosaleda.jpg", alt: "Estadio La Rosaleda", nombre: "Estadio La Rosaleda", capacidad: 30044, anoCreacion: 1941, club: "Malaga club de Futbol"},
        { href: "https://www.realsporting.com/molinon-tour", src: "img/molinon.jpg", alt: "Estadio El Molinon", nombre: "Estadio El Molinon", capacidad: 30000, anoCreacion: 1908, club: "Sporting de Gijon"},
        { href: "https://www.wembleystadium.com/", src: "img/wembley.jpg", alt: "Wembley", nombre: "Wembley", capacidad: 90000, anoCreacion: 1923, club: "Seleccion Inglesa de Futbol"},
        { href: "https://www.manutd.com/en/visit-old-trafford", src: "img/oldTrafford.jpg", alt: "Old Trafford", nombre: "Old Trafford", capacidad: 76212, anoCreacion: 1910, club: "Manchester United"},
        { href: "https://www.tottenhamhotspur.com/the-stadium/", src: "img/tottenhamHotspurStadium.jpg", alt: "Tottenham Hotspur Stadium", nombre: "Tottenham Hotspur Stadium", capacidad: 62850, anoCreacion: 2019, club: "Tottenham Hotspur"},
        { href: "https://www.arsenal.com/the-club/emirates-stadium", src: "img/emirates.jpg", alt: "Emirates Stadium", nombre: "Emirates Stadium", capacidad: 60338, anoCreacion: 2006, club: "Arsenal"},
        { href: "https://www.londres.es/estadio-olimpico-londres", src: "img/olimpicolondres.jpg", alt: "Olimpyc London Stadium", nombre: "Olimpyc London Stadium", capacidad: 68000, anoCreacion: 2012, club: "West Ham United"},
        { href: "https://www.mancity.com/etihad-stadium", src: "img/etihad.jpg", alt: "Etihad Stadium", nombre: "Etihad Stadium", capacidad: 55000, anoCreacion: 2002, club: "Machester City"},
        { href: "https://www.liverpoolfc.com/info/anfield", src: "img/anfield.jpg", alt: "Anfield", nombre: "Anfield", capacidad: 54074, anoCreacion: 1884, club: "Liverpool"},
        { href: "https://www.newcastleunited.com/stadium/", src: "img/jamespark.jpg", alt: "St James Park", nombre: "St James Park", capacidad: 52401, anoCreacion: 1880, club: "Newcastle United"},
        { href: "https://www.avfc.co.uk/villa-park/", src: "img/villapark.jpg", alt: "Villa Park", nombre: "Villa Park", capacidad: 42785, anoCreacion: 1897, club: "Aston Villa"},
        { href: "https://www.chelseafc.com/en/stadium-tours-and-museum", src: "img/stamford.jpg", alt: "Stamford Bridge", nombre: "Stamford Bridge", capacidad: 40623, anoCreacion: 1877, club: "Chelsea Football Club"},
        { href: "https://www.inter.it/en/club/stadium", src: "img/giussepe.jpg", alt: "Estadio Giuseppe Meazza", nombre: "Estadio Giuseppe Meazza", capacidad: 80018, anoCreacion: 1927, club: "FC Internazionale"},
        { href: "https://www.acmilan.com/en/club/venues/san-siro", src: "img/giussepe.jpg", alt: "San Siro", nombre: "San Siro", capacidad: 80018, anoCreacion: 1927, club: "AC Milan"},
        { href: "https://www.asroma.com/en/stadium", src: "img/estadioolimpico.jpg", alt: "Stadio Olimpico de Roma", nombre: "Stadio Olimpico de Roma", capacidad: 72700, anoCreacion: 1952, club: "AS Roma"},
        { href: "https://www.sslazio.it/it/biglietteria/stadio-e-regolamenti", src: "img/estadioolimpico.jpg", alt: "Stadio Olimpico de Roma", nombre: "Stadio Olimpico de Roma", capacidad: 72700, anoCreacion: 1952, club: "SS Lazio"},
        { href: "https://www.sscalciobari.it/it/page/22-regolamento-duso/", src: "img/sannicola.jpg", alt: "Stadio San Nicola", nombre: "Stadio San Nicola", capacidad: 58248, anoCreacion: 1990, club: "SSC Bari"},
        { href: "https://sscnapoli.it/il-club-calcio-napoli-s-p-a/", src: "img/StadioMaradona.jpg", alt: "Stadio Diego Armando Maradona", nombre: "Stadio Diego Armando Maradona", capacidad: 55000, anoCreacion: 1959, club: "SSC Napoli"},
        { href: "https://www.acffiorentina.com/en/tickets/stadio-franchi", src: "img/armeniofranchi.jpg", alt: "Stadio Armenio Franchi", nombre: "Stadio Armenio Franchi", capacidad: 47300, anoCreacion: 1931, club: "ACF Fiorentina"},
        { href: "https://www.juventus.com/en/allianz-stadium/", src: "img/juventusStadium.jpg", alt: "Juventus Stadium", nombre: "Juventus Stadium", capacidad: 40507, anoCreacion: 2011, club: "Juventus"},
        { href: "https://www.ticket-onlineshop.com/ols/bvbstadion/", src: "img/signal.jpg", alt: "Signal Iduna Park", nombre: "Signal Iduna Park", capacidad: 80645, anoCreacion: 1974, club: "Borussia Dortmund"},
        { href: "https://fcbayern.com/museum/es", src: "img/allianz.jpg", alt: "Allianz Arena", nombre: "Allianz Arena", capacidad: 75000, anoCreacion: 2005, club: "Bayern Munich"},
        { href: "https://www.bundesliga.com/es/bundesliga/noticias/olympiastadion-estadio-hertha-berlin-alemania-6042", src: "img/berlin.jpg", alt: "Estadio Olimpico de Berlin", nombre: "Estadio Olimpico de Berlin", capacidad: 70400, anoCreacion: 1936, club: "Hertha BSC"},
        { href: "https://schalke04.de/en/the-veltins-arena/the-veltins-arena-2/", src: "img/veltins.jpg", alt: "Veltins Arena", nombre: "Veltins Arena", capacidad: 61975, anoCreacion: 2001, club: "FC Schalke 04"},
        { href: "https://www.mhparena-stuttgart.de/", src: "img/mhparena.jpg", alt: "Mercedes Benz Arena", nombre: "Mercedes Benz Arena", capacidad: 60440, anoCreacion: 1933, club: "VfB Stuttgart"},
        { href: "https://www.borussia.de/es/club/destino-borussia-park", src: "img/borrusiapark.jpg", alt: "Borussia Park", nombre: "Borussia Park", capacidad: 54070, anoCreacion: 2004, club: "Borussia Mönchengladbach"},
        { href: "https://www.deutschebankpark.de/", src: "img/eintracht.jpg", alt: "Commerzbank Arena", nombre: "Commerzbank Arena", capacidad: 51500, anoCreacion: 1925, club: "Eintracht Frankfurt"}
    ];

    const estadiosContenedor = document.getElementById('estadios');

    estadios.forEach(estadio => {
        const div = document.createElement('div');
        div.className = 'estadio';
        div.setAttribute('data-club', estadio.club);  // Añadir el nombre del club como atributo de datos

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
        button.onclick = () => seleccionarEstadio(estadio, button);

        a.appendChild(img);
        div.appendChild(a);
        div.appendChild(h3);
        div.appendChild(button);
        estadiosContenedor.appendChild(div);
    });
});

function seleccionarEstadio(estadio, button) {
    if (!estadioSeleccionado1) {
        estadioSeleccionado1 = estadio;
        button.style.backgroundColor = 'lightblue'; // Marca visualmente la selección
        alert('Primera selección: ' + estadio.nombre);
    } else if (!estadioSeleccionado2) {
        estadioSeleccionado2 = estadio;
        button.style.backgroundColor = 'lightgreen'; // Marca visualmente la selección
        alert('Segunda selección: ' + estadio.nombre);
        document.getElementById('btnComparar').style.display = 'block';
        document.getElementById('btnSubir').style.display = 'block';
    } else {
        alert('Ya has seleccionado dos estadios: ' + estadioSeleccionado1.nombre + ' y ' + estadioSeleccionado2.nombre);
    }
}

function compararEstadios() {
    if (estadioSeleccionado1 && estadioSeleccionado2) {
        const resultadoDiv = document.getElementById('resultadoComparacion');
        resultadoDiv.innerHTML = `
            <h3>Comparación de Estadios</h3>
            <p><strong>${estadioSeleccionado1.nombre}</strong> vs <strong>${estadioSeleccionado2.nombre}</strong></p>
            <p>Capacidad: ${estadioSeleccionado1.capacidad || 'N/A'} vs ${estadioSeleccionado2.capacidad || 'N/A'}</p>
            <p>Año de Creación: ${estadioSeleccionado1.anoCreacion || 'N/A'} vs ${estadioSeleccionado2.anoCreacion || 'N/A'}</p>
            <p>Club: ${estadioSeleccionado1.club || 'N/A'} vs ${estadioSeleccionado2.club || 'N/A'}</p>
        `;
    } else {
        alert('Por favor selecciona dos estadios para comparar.');
    }
}

function scrollToComparar() {
    const btnComparar = document.getElementById('btnComparar');
    btnComparar.scrollIntoView({ behavior: 'smooth' });
}