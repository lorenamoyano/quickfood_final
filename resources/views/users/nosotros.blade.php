@extends('layouts.app')

@section('content')

<!-- PAGINA COMPLETA CON GRID // FLEX -->
<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">
                <video src="{{asset('video/video.mp4')}}" width=820 height=480 controls>
                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
                    La versión descargable está disponible en <a href="URL">Enlace</a>.
                </video>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Galería</button>

                <div data-backdrop="static" data-keyboard="false" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Galería de imágenes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-content">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#hide1").click(function() {
                $("#element1").hide();
            });
            $("#show1").click(function() {
                $("#element1").show();
            });
        });
    </script>

    @endsection