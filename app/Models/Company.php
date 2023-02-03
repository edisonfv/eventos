<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'businessname',
        'address',
        'phone',
        'email',
        'date_begin',
        'date_end',
        'tne_id',
        'profile_company',
        'active',
        'plan_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_begin' => 'date',
        'date_end' => 'date',
        'active' => 'boolean',
    ];

    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
