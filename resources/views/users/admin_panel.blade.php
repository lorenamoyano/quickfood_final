@extends('layouts.app')

@section('content')
@if(Auth::user()&&Auth::user()->perfil === "admin")
<div class="container" id="contenedor"></div>
<br />
<div class="container">
    <h3 align="center">Panel de administración</h3><br />
    <div class="row">
        <div class="col-sm-9">

        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" />
            </div>
        </div>
    </div>
    <div class="table-responsive col-sm-12">
        <table class="table_admin col-sm-12">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Ciudad</th>
                    <th>Perfil</th>
                    <th>Unido hace...</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <form method="get" action="{{ route('perfil') }}">
                    @csrf
                    <!-- si no se pone da un error de que la página ha expirado -->
                    <input id="id" type="hidden" name="id" value="" />
                    <input id="perfil" type="hidden" name="perfil" value="" />
                </form>
                @include('users.pagination_data')
            </tbody>
        </table>
        <div colspan="3" align="center" style="margin-top: 2em;">
            {!! $data->links() !!}
        </div>
        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
    </div>
</div>


<script>
    $(document).ready(function() {
        $('select').change(function(e) {

            var id = $(e.target).data('id');
            var profile = '#' + id.toString() + " option:selected";
            $('#perfil').val($(profile).val());
            $('#id').val(id);

            $('form').submit();
        });
    });
</script>
<script>
    $(document).ready(function() {

        function fetch_data(page, sort_type, sort_by, query) {
            $.ajax({
                url: "pagination/fetch_data?page=" + page + "&sortby=" + sort_by +
                    "&sorttype=" + sort_type + "&query=" + query,
                success: function(data) {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $(document).on('keyup', '#search', function() {
            var query = $('#search').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page, sort_type, column_name, query);
        });



        $(document).on('click', '.admin_panel a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();

            var query = $('#search').val();

            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetch_data(page, sort_type, column_name, query);
        });

    });
</script>

@else
<div class="alert alert-danger col-sm-5 mx-auto">
    {{ ('No tienes permisos para ver esta página') }}
</div>
@endif

@endsection