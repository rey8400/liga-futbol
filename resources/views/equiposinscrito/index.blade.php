@extends('admin-torneo.layouts.master')

@section('template_title')
    Equiposinscrito
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <h4>Equipos Inscritos</h4>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('equiposinscrito.create' ,$torneo->id) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Inscribir un Equipo
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table class="table table-striped table-hover table-bordered nowrap" id="MyTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Torneo Id</th>
										<th>Equipo</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
										<th>Partidos Ganados</th>
										<th>Partidos Empatados</th>
										<th>Partidos Perdidos</th>
										<th>Goles Favor</th>
										<th>Goles Contra</th>
										<th>Diferencia</th>
										<th>Puntos</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equiposinscritos as $equiposinscrito)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $equiposinscrito->torneo->nombre }}</td>
											<td>{{ $equiposinscrito->equipo->nombre }}</td>
                                            <td><img src="{{ asset('storage/escudos/'.$equiposinscrito->equipo->imagen) }}" width="50" class="img-thumbnail rounded-circle"></td>
                                            <td>
                                                <form action="{{ route('equiposinscrito.destroy', ['torneo' => $torneo->id, 'equiposinscrito' => $equiposinscrito->id]) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('equiposinscrito.show', ['torneo' => $torneo->id, 'equiposinscrito' => $equiposinscrito->id]) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('equiposinscrito.edit', ['torneo' => $torneo->id, 'equiposinscrito' => $equiposinscrito->id]) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
											<td>{{ $equiposinscrito->partidos_ganados }}</td>
											<td>{{ $equiposinscrito->partidos_empatados }}</td>
											<td>{{ $equiposinscrito->partidos_perdidos }}</td>
											<td>{{ $equiposinscrito->goles_favor }}</td>
											<td>{{ $equiposinscrito->goles_contra }}</td>
											<td>{{ $equiposinscrito->diferencia }}</td>
											<td>{{ $equiposinscrito->puntos }}</td>

                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('Myjavascript')

<script >

var table = new DataTable('#MyTable', {

    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 1 },

    ] ,  "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior"
            }
        }, 
 

});

table.buttons().container()
        .appendTo( '#MyTable_wrapper .col-md-6:eq(0)' );

 

/*
      document.addEventListener('click', function(e) {
    if (e.target.classList.contains('deleteIcon')) {
        e.preventDefault();
        let id = e.target.id;
        let csrf = '{{ csrf_token() }}';

        Swal.fire({
            title: '¿Quieres eliminar este registro?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`{{ url('torneo') }}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf
                    },
                    // No necesitas JSON.stringify para enviar solo el ID
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    Swal.fire(
                        'Eliminado',
                        'Registro eliminado con éxito.',
                        'success'
                    );
                    
                })
              // Recargar la página
              location.reload();
            }
        });
    }
});*/

</script>
@endsection
