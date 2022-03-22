<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Laravel CRUD</title>
</head>

<body>
    <h1 style="text-align: center;">Todos</h1>

    <hr>

    <h2 style="margin-left:135px; margin-bottom:10px;">Ajouter de nouvelles Tâches:</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($$errors->all() as $$error)
            <li>{{$$error}}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('/todos') }}" method="POST">
                    @csrf
                    <input style="margin-bottom: 10px;" type="text" class="form-control" name="name" placeholder="Nom de la tâche">
                    <input style="margin-bottom: 10px;" type="title" class="form-control" name="title" placeholder="Titre de la tâche">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Description de la tâche"></textarea>
                    <button style="margin-top: 10px;" class="btn btn-primary" type="submit">Sauvegarder</button>
                </form>
            </div>
            <div class="col-md-6" style="overflow: scroll; height:370px;">
                <h2 style="text-align: center;">Tâches en attente:</h2>
                <ul class="list-group">
                    @foreach($todos as $todo)
                    <li style="margin-bottom:20px" class=" container list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Nom</h3>
                                <hr>
                                {{ $todo->name}}
                            </div>

                            <div class="col-md-4">
                                <h3>Titre</h3>
                                <hr>
                                {{ $todo->title}}
                            </div>

                            <div class="col-md-4">
                                <h3>Description</h3>
                                <hr>
                                {{ $todo->description}}
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false" aria-controls="collapse-{{ $loop->index }}">
                            Modifier
                        </button>

                        <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                            <div class="card-body">
                                <div class="col-md-6">
                                    <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $todo->name }}">
                                        <input style="margin-bottom: 10px;" type="title" name="title" value="{{ $todo->title }}">
                                        <textarea name="description" id="" cols="30" rows="10">{{ $todo->description }}</textarea>
                                        <button class="btn btn-secondary" type="submit">Mettre A Jour</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <hr>
            </div>
        </div>
    </div>
    <hr>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>