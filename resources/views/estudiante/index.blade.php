@extends('welcome')

@section('titulo', 'Ver Estudiantes')

@section('contenido')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection


    <h1 class="my-3">INDEX de Estudiantes</h1>
    <br>
    <a href="estudiantes/create" class="btn btn-primary">Crear</a>
    <div class="table-responsive my-3">
        <table id="estudiantet" class="table mt-3">
            <thead class="table-dark">
                <tr>
                <th class="text-light" scope="col">ID</th>
                <th class="text-light" scope="col">MATRICULA</th>
                <th class="text-light" scope="col">NOMBRE</th>
                <th class="text-light" scope="col">APELLIDO PATERNO</th>
                <th class="text-light" scope="col">APELLIDO MATERNO</th>
                <th class="text-light" scope="col">CORREO</th>
                <th class="text-light" scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{$estudiante->id}}</td>
                        <td>{{$estudiante->matricula}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->apellidopaterno}}</td>
                        <td>{{$estudiante->apellidomaterno}}</td>
                        <td>{{$estudiante->correo}}</td>
                        <td>
                            <a href="/estudiantes/{{$estudiante->id}}/edit" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$estudiante->id}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @include('estudiante.modal')
                @endforeach
            </tbody>
        </table>
    </div>
    

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> {{-- Es para lo de datatable --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> {{-- Es para lo de datatable --}}
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> {{-- Es para lo de datatable --}}
    {{-- Es para lo de datatable y se pone el id de nuestra tabla --}}
    <script>
        $(document).ready(function () {
            $('#estudiantet').DataTable({
                language: {
                "lengthMenu": "Mostrar _MENU_Registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de MAX registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			},
            "sProcessing":"Procesando...",
                },
                responsive: "true",
            });
        });
    </script>
    @endsection

@endsection