<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Rayons</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 30px;
            color: #343a40;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Liste des Rayons</h1>
    <a href="{{ route('rayons.create') }}" class="btn btn-primary mb-3">Ajouter un Rayon</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Partie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rayons as $rayon)
                <tr>
                    <td>{{ $rayon->libelle }}</td>
                    <td>{{ $rayon->partie }}</td>
                    <td>
                        <a href="{{ route('rayons.show', $rayon->id) }}" class="btn btn-info">Détails</a>
                        <a href="{{ route('rayons.edit', $rayon->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
