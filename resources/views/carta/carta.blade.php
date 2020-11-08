@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->perfil=="admin")
<a href="{{ route('anadir') }}" class="btn btn-primary">Añadir elemento a la carta</a>

<div class="container" id="contenedor">
</div>
<div id="result"></div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <!--<div class="form-group">
            <input type="text" id="search2" class="form-control" placeholder="Buscar productos" />
        </div>-->
        <br>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th><label>
                                <input type="text" required id="search2">
                                <ul class="buscar">
                                    <li s class="letra">B</li>
                                    <li e class="letra">U</li>
                                    <li a class="letra">S</li>
                                    <li r class="letra">C</li>
                                    <li c class="letra">A</li>
                                    <li h class="letra">R</li>
                                </ul>
                            </label></th>
                        <th>Precio</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- PAGINACION -->
        <br>
    </div>

</div>

</div>
</div>


<!--<script>
    $('#buscador').submit(function() {
        $(this).attr('action', 'http://localhost/quickfood/quickfood/public/buscar/' + $('#buscador #search').val());
    });
</script>-->


<script>
    $(document).ready(function() {

        fetch_carta_data();

        function fetch_carta_data(query = '') {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search2', function() {
            var query = $(this).val();
            fetch_carta_data(query);
        });
    });
</script>
@else

<div class="container" id="contenedor">
</div>
<div id="result"></div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <!--<div class="form-group">
            <input type="text" id="search2" class="form-control" placeholder="Buscar productos" />
        </div>-->
        <br>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th><label>
                                <input type="text" required id="search2">
                                <ul class="buscar">
                                    <li s class="letra">B</li>
                                    <li e class="letra">U</li>
                                    <li a class="letra">S</li>
                                    <li r class="letra">C</li>
                                    <li c class="letra">A</li>
                                    <li h class="letra">R</li>
                                </ul>
                            </label></th>
                        <th>Precio</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- PAGINACION -->
        <br>
        <!--<div class="clearfix">
            {{ $carta->links() }}
        </div>-->
    </div>

</div>

</div>
</div>


<!--<script>
    $('#buscador').submit(function() {
        $(this).attr('action', 'http://localhost/quickfood/quickfood/public/buscar/' + $('#buscador #search').val());
    });
</script>-->


<script>
    $(document).ready(function() {

        fetch_carta_data();

        function fetch_carta_data(query = '') {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search2', function() {
            var query = $(this).val();
            fetch_carta_data(query);
        });
    });
</script>
@endif
@endsection