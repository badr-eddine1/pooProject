<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reserver extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'livre_id',
    'date_reservation',
    'date_retour_prevu',
    'date_retour_effectif'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function livre():BelongsTo{
        return $this->belongsTo(livre::class);
    }
}
