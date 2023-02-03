<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subsidiary extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['code', 'address', 'phone', 'active', 'company_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function cashregisters()
    {
        return $this->hasMany(Cashregister::class);
    }
}
