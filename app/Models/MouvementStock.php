<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvementStock extends Model
{
    use HasFactory;

    protected $table = 'mouvements_stock';
    
    protected $fillable = ['article_id', 'type_mouvement', 'quantité', 'direction_id', 'ville_destination', 'date_mouvement'];

            public function article()
            {
                return $this->belongsTo(Article::class);
            }

            public function direction()
            {
                return $this->belongsTo(Direction::class);
            }
}
