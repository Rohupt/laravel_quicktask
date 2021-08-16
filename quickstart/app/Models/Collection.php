<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public function words()
    {
        return $this->belongsToMany(Word::class, 'collection_word', 'collection_id', 'word_id');
    }
}
