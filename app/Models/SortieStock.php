<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieStock extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'quantité_sortie', 'ville_destination', 'direction_id', 'date_sortie', 'quantité_restante'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
