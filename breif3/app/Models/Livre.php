<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'date_de_publication', 'nombre_de_pages', 'auteur', 'isbn', 'editeur', 'rayon_id', 'categorie_id', 'image'
    ];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

