<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cashregister extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['code', 'responsible', 'subsidiary_id'];

    protected $searchableFields = ['*'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
