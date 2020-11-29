@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
    <input type="text" name="q" class="form-control my-3 search-input">
    <div class="card">
        <div class="card-header">Buscador</div>
        <div class="list-group list-group-flush search-result">
            @foreach ($carta as $producto)
            <input type="hidden" value="{{$producto->id}}" name="id">
            <li>{{$producto->nombre}}<br>
                @endforeach
        </div>
    </div>

</div>

</div>
</div>
<script>
    $(document).ready(function() {
        $('.search-input').on('keyup', function() {
            var _q=$(this).val();
            console.log(_q);
                $.ajax({
                    url:"{{url('search')}}",
                    data: {
                        q: _q
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(".search-result").html('<li class="list-group-item">Buscando...</li>');
                    },
                    success:function(res) {
                        var _html='';
                        $.each(res.data,function(index,data) {
                            _html+='<li class="list-group-item">'+data.nombre+'</li>';
                        });
                        $(".search-result").html(_html);
                    }
                });
            
        });
    });
</script>
@endsection