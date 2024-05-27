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
                    <h2>Editar Empresa</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ 
route('empresas.index') }}" enctype="multipart/form-data">
                        Regresar</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('empresas.update',$empresa->id) 
}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre Empresa:</strong>
                        <input type="text" name="nombre" value="{{ $empresa->nombre }}" class="form-control" placeholder="Nombre Empresa">
                        @error('nombre')
                        <div class="alert alert-danger mt1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email Empresa:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email Empresa" value="{{ 
$empresa->email }}">
                        @error('email')
                        <div class="alert alert-danger mt1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion
                            Empresa:</strong>
                        <input type="text" name="direccion" value="{{ $empresa->direccion }}" class="formcontrol" placeholder="Direccion Empresa">
                        @error('direccion')
                        <div class="alert alert-danger mt1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary 
ml-3">Editar</button>
            </div>
        </form>
    </div>
</body>

</html>