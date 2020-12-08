@extends('layouts.footer')

@section('content')

<!-- PAGINA COMPLETA CON GRID -->
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div>
            <div>
                <div class="container">
                    <div class="gallery">
                        <figure class="gallery__item gallery__item--1">
                            <img src="img/patatas.jpg" class="gallery__img" alt="Image 1">
                        </figure>
                        <figure class="gallery__item gallery__item--2">
                            <img src="img/perritos.jpg" class="gallery__img" alt="Image 2">
                        </figure>
                        <figure class="gallery__item gallery__item--3">
                            <img src="img/hamburguesa.jpg" class="gallery__img" alt="Image 3">
                        </figure>
                        <figure class="gallery__item gallery__item--4">
                            <img src="img/food.jpg" class="gallery__img" alt="Image 4">
                        </figure>
                        <figure class="gallery__item gallery__item--5">
                            <img src="img/burguer.jpg" class="gallery__img" alt="Image 5">
                        </figure>
                        <figure class="gallery__item gallery__item--6">
                            <img src="img/menu.png" class="gallery__img" alt="Image 6">
                        </figure>
                        <figure class="gallery__item gallery__item--7">
                            <img src="img/drinks.jpg" class="gallery__img" alt="Image 7">
                        </figure>
                        <figure class="gallery__item gallery__item--8">
                            <img src="img/cafe.jpg" class="gallery__img" alt="Image 8">
                        </figure>
                    </div>
                    <div>
                        <video src="{{asset('video/video.mp4')}}" width=820 height=480 controls>
                            Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
                            La versión descargable está disponible en <a href="URL">Enlace</a>.
                        </video>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
