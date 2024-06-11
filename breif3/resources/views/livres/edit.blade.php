<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier le Livre</title>
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
    <h1>Modifier le Livre</h1>
    <form action="{{ route('livres.update', $livre->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $livre->titre }}" required>
        </div>
        <div class="col-md-6">
            <label for="date_de_publication" class="form-label">Date de Publication</label>
            <input type="date" class="form-control" id="date_de_publication" name="date_de_publication" value="{{ $livre->date_de_publication }}" required>
        </div>
        <div class="col-md-6">
            <label for="nombre_de_pages" class="form-label">Nombre de Pages</label>
            <input type="number" class="form-control" id="nombre_de_pages" name="nombre_de_pages" value="{{ $livre->nombre_de_pages }}" required>
        </div>
        <div class="col-md-6">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $livre->auteur }}" required>
        </div>
        <div class="col-md-6">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $livre->isbn }}" required>
        </div>
        <div class="col-md-6">
            <label for="editeur" class="form-label">Editeur</label>
            <input type="text" class="form-control" id="editeur" name="editeur" value="{{ $livre->editeur }}" required>
        </div>
        <div class="col-md-6">
            <label for="rayon_id" class="form-label">Rayon</label>
            <select class="form-control" id="rayon_id" name="rayon_id" required>
                @foreach($rayons as $rayon)
                    <option value="{{ $rayon->id }}" {{ $livre->rayon_id == $rayon->id ? 'selected' : '' }}>{{ $rayon->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $livre->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary mt-3">Mettre à Jour</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
