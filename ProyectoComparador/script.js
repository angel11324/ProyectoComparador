window.addEventListener('load', function(){
    //Array con las rutas de las imagenes del carrusel
    var imagenes = [
        "img/allianz.jpg",
        "img/anfield.jpg",
        "img/campnou.jpg",
        "img/metropolitano.jpg",
        "img/estadioolimpico.jpg"
    ];


    var imagenActual = 0;
    //Elegimos la foto por la que queremos empezar
    var img = document.getElementById('foto1');

    function cambiarImagen(){
        img.src = imagenes[imagenActual];
        imagenActual++;
        while(imagenActual==5){
            imagenActual = 0;
        }
    }


    setInterval(cambiarImagen, 3000);


    const form = document.getElementById("comentarios-form");
    const comentariosLista = document.getElementById("comentarios-lista");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        
        const nombre = document.getElementById("nombre").value;
        const comentario = document.getElementById("comentario").value;

        if (nombre && comentario) {
            const comentarioElemento = document.createElement("div");
            comentarioElemento.classList.add("comentario");

            const nombreElemento = document.createElement("h3");
            nombreElemento.textContent = nombre;

            const comentarioTexto = document.createElement("p");
            comentarioTexto.textContent = comentario;

            comentarioElemento.appendChild(nombreElemento);
            comentarioElemento.appendChild(comentarioTexto);

            comentariosLista.appendChild(comentarioElemento);

            form.reset();
        } else {
            alert("Por favor, completa todos los campos.");
        }
    });

})