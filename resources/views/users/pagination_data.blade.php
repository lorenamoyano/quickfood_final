<form method="get" action="{{ route('perfil') }}">
                    @csrf
                    <!-- si no se pone da un error de que la página ha expirado -->
                    <input id="id" type="hidden" name="id" value="" />
                    <input id="perfil" type="hidden" name="perfil" value="" />
                </form>
@foreach($data as $row)
      <tr>
      <tr>

<td> {{ $row->nombre }} </td>
<td> {{ $row->apellido1 }} {{$row->apellido2}} </td>
<td> {{ $row->DNI }} </td>
<td> {{ $row->telefono }} </td>
<td> {{ $row->email }} </td>
<td> {{ $row->ciudad }} </td>
<td>
    <select class="custom-select" id="{{ $row->id }}" data-id="{{ $row->id }}">
        <option value="admin"> Administrador </option>
        <option value="repartidor" @if( $row->perfil == "repartidor") selected @endif > Repartidor </option>
        <option value="user" @if( $row->perfil == "user") selected @endif > Cliente </option>
    </select>
</td>
<td>{{ $diff = Carbon\Carbon::parse($row->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>

<td><a href="{{ route('delete' , ['id' => $row->id]) }}"><i class="fa fa-trash" style="color:red"></i></a></td>
</tr>
      @endforeach
      <tr>
       <!-- LINKS -->
      </tr>