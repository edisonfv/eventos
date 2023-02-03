<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'days',
        'profile',
        'order',
        'receipt',
        'subsidiary',
        'users',
    ];

    protected $searchableFields = ['*'];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
