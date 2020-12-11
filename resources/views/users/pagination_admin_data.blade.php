<form method="get" action="{{ route('perfil') }}">
    @csrf
    <!-- si no se pone da un error de que la página ha expirado -->
    <input id="id" type="hidden" name="id" value="" />
    <input id="perfil" type="hidden" name="perfil" value="" />
</form>
<div class="table-responsive col-sm-12">
    <table class="table_admin col-sm-12">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Ciudad</th>
            <th>Perfil</th>
            <th>Unido</th>
            <th>Borrar</th>
        </tr>

        @foreach($data as $row)
        <tr>
            <td> {{ $row->nombre }} </td>
            <td> {{ $row->apellido1 }} {{$row->apellido2}} </td>
            <td> {{ $row->DNI }} </td>
            <td> {{ $row->telefono }} </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row->ciudad }} </td>
            <td>
                <select class="custom-select" id="{{ $row->id }}" data-id="{{ $row->id }}">
                    <option value="1"> Administrador </option>
                    <option value="3" @if( $row->perfil == 3) selected @endif > Repartidor </option>
                    <option value="2" @if( $row->perfil == 2) selected @endif > Cliente </option>
                </select>
            </td>
            <td>{{ $diff = Carbon\Carbon::parse($row->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>

            <td class="icono"><a href="{{ route('delete' , ['id' => $row->id]) }}"><i class="fa fa-trash" style="color:red"></i></a></td>
            </tr>
        @endforeach
    </table>
    <div class="links">
    <div colspan="3" class="col-sm-12 mt-4">
        {{ $data->links() }}
    </div>
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