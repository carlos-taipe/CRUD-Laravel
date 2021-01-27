<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
</head>

<body>
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Ejemplo CRUD Básico</h1>
            </div>
          </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                            @endforeach
                        </div>
                        @endif
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="form-row">
                            <div class="col-sm-3">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('contraseña')}}">
                            </div>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary">Añadir</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.destroy',$user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" 
                                value="Eliminar" 
                                class="btn btn-sm btn-danger" 
                                onclick="return confirm('¿Desea eliminar usuario...?')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>

</html>