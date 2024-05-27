<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejemplo CRUD Empresas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/boots
trap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ejemplo CRUD Empresas</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ 
route('empresas.create') }}"> Crear Empresa</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Empresa Nombre</th>
                <th>Empresa Email</th>
                <th>Empresa Direccion</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->email }}</td>
                <td>{{ $empresa->direccion }}</td>
                <td>
                    <form action="{{ 
route('empresas.destroy',$empresa->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn 
btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $empresas->links() !!}
</body>

</html>