<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SearchTerm extends Model
{
    use Searchable;

    protected $fillable = ['terms', 'link'];

    public function toSearchableArray()
    {
        return [
            'terms' => $this->terms,
        ];
    }
}
