<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
            <a href="{{route('todo.create')}}">create a task</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Titres</th>
                <th>Date</th>
                <th>Temps</th>
                <th>Categorie</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->Titres}}</td>
                    <td>{{$todo->Date}}</td>
                    <td>{{$todo->Temps}}</td>
                    <td>{{$todo->Categorie}}</td>
                    <td>{{$todo->Détails}}</td>
                    <td>
                        <a href="{{route('todo.edit', ['todo' => $todo ])}}">edit</a>
                    </td>
                    <td>
                        <form action="{{route('todo.destroy', ['todo' => $todo])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
</body>
</html>