@extends('layouts.app')

@section('content')
<!-- PAGINA COMPLETA CON GRID // FLEX -->
<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.4261397596206!2d-4.551777885361467!3d36.73634117899277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f032e293b691%3A0xbddfd47a7f8b8145!2sCalle%20de%20Marie%20Curie%2C%2010%2C%2029590%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1606243842593!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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