<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Administrador</title>
</head>

<style>
    .color-fondo {
        background-color: rgb(86, 39, 86);
    }

    .container {
        background-color: rgb(229, 236, 239);
        color: black -webkit-box-shadow: 5px 5px 15px 5px #000000;
        box-shadow: 5px 5px 15px 5px #000000;
    }

    .titulo {
        letter-spacing: .15em;
    }
</style>

<body class="color-fondo">

    <br>

    {{-- Pagina --}}
    <div class="container d-flex align-items-center">
        <div class="mx-auto">
            <div class="container-fluid">
                <br>
                {{-- Titulo --}}
                <h2 class="titulo h2">Administrador de figuras</h2>

                {{-- Encabezado --}}
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <p class="nav-link text-dark">Edain Jesus Cortez Ceron </p>
                    </div>

                    {{-- Actualizar pagina --}}
                    <div class="p-2 bd-highlight">
                        <a href="{{ url()->current() }}" class="btn btn-outline-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                <path
                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                            </svg>
                        </a>
                    </div>

                </div>

                {{-- Tabla --}}
                <table class="table responsive">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">usuario</th>
                            <th scope="col">Estado</th>
                            <th scope="col">aleatorio</th>
                            <th scope="col">rotacion</th>
                            <th scope="col">movimiento</th>
                            <th scope="col">cdona</th>
                            <th scope="col">fondo</th>
                            <th scope="col">opacidad</th>
                            <th scope="col">opciones</th>
                        </tr>
                    </thead>
                    @foreach ($usuarioDona as $u)
                        <tr class="text-center">
                            {{-- Numero --}}
                            <td>{{ $loop->iteration }}</td>
                            {{-- Nombre --}}
                            <td>
                                <p class="text-decoration-none datos-nombres"> {{ $u->nombre }}</p>
                            </td>
                            {{-- Conectado --}}
                            <td>
                                <div class={{ $u->conectado ? 'text-success' : 'text-danger' }}>
                                    <p class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                    </p>
                                </div>
                            </td>
                            {{-- Dona aleatoria --}}
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input datos-dona-aleatoria" type="checkbox" value=1
                                            {{ $u->aleatorio ? 'checked' : '' }} />
                                    </div>
                                </div>
                            </td>
                            {{-- Rotacion --}}
                            <td>
                                <select class="form-select datos-dona-rotacion">
                                    <option value="NINGUNA" {{ $u->rotacion == 'NINGUNA' ? 'selected' : '' }}>
                                        Ninguna
                                    </option>
                                    <option value="IZQUIERDA" {{ $u->rotacion == 'IZQUIERDA' ? 'selected' : '' }}>
                                        Izquierda
                                    </option>
                                    <option value="DERECHA" {{ $u->rotacion == 'DERECHA' ? 'selected' : '' }}>
                                        Derecha
                                    </option>
                                    <option value="ARRIBA" {{ $u->rotacion == 'ARRIBA' ? 'selected' : '' }}>
                                        Arriba
                                    </option>
                                    <option value="ABAJO" {{ $u->rotacion == 'ABAJO' ? 'selected' : '' }}>
                                        Abajo
                                    </option>
                                </select>
                            </td>
                            {{-- Movimiento --}}
                            <td>
                                <select class="form-select datos-dona-movimiento">
                                    <option value="NINGUNO" {{ $u->movimiento == 'NINGUNO' ? 'selected' : '' }}>
                                        Ninguna
                                    </option>
                                    <option value="IZQUIERDA" {{ $u->movimiento == 'IZQUIERDA' ? 'selected' : '' }}>
                                        Izquierda
                                    </option>
                                    <option value="DERECHA" {{ $u->movimiento == 'DERECHA' ? 'selected' : '' }}>
                                        Derecha
                                    </option>
                                    <option value="ARRIBA" {{ $u->movimiento == 'ARRIBA' ? 'selected' : '' }}>
                                        Arriba
                                    </option>
                                    <option value="ABAJO" {{ $u->movimiento == 'ABAJO' ? 'selected' : '' }}>
                                        Abajo
                                    </option>
                                </select>
                            </td>
                            {{-- Color de dona --}}
                            <td>
                                <input class="form-control form-control-color datos-color_dona" type="color"
                                    value={{ '#' . $u->color_dona }}>
                            </td>
                            {{-- Color de l fondo --}}
                            <td>
                                <input class="form-control form-control-color datos-color_fondo" type="color"
                                    value={{ '#' . $u->color_fondo }}>
                            </td>
                            {{-- Opacidad --}}
                            <td>
                                <input class="form-range datos-opacidad" type="range" min="0" max="100"
                                    step="10" value={{ $u->opacidad * 100 }}>
                            </td>
                            {{-- Opciones --}}
                            <td>
                                {{-- Eliminar --}}
                                <form action={{ '/figuras/donas/eliminar/tabla/' . $u->nombre }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



    {{-- script --}}
    <script src="js/index.js"></script>

</body>

</html>
