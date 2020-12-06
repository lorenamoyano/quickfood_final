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
                <a href="#" id="show1" type="button" class="btn btn-success">Galería de imágenes</a>
                <div id="element1" style="display: none;">
                    <div id="close1"><a href="#" id="hide1">cerrar</a></div>
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