<?php

namespace App\Models;

use App\Models\auteur;
use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class livre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'isbn','auteur_id','categorie_id' , 'date_publication', 'editeur', 'description', ];

    public function auteur():BelongsTo{
        return $this->belongsTo(auteur::class);
    }
    public function categorie():BelongsTo{
        return $this->belongsTo(categorie::class);
    }
}
