<?php

namespace App\Models;

use App\Models\livre;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class emprunter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
     'livre_id',
    'date_emprunt',
    'date_retour_prevu',
    'date_retour_effectif'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function livre():BelongsTo{
        return $this->belongsTo(livre::class);
    }
}
