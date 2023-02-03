<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'date',
        'value',
        'description',
        'supplier',
        'user_id',
        'company_id',
        'result',
        'errCode',
        'errorDescription',
        'userPaymentOptionId',
        'ccCardNumber',
        'bin',
        'last4Digits',
        'ccExpMonth',
        'ccExpYear',
        'transactionId',
        'threeDReason',
        'threeDReasonId',
        'challengeCancelReasonId',
        'challengeCancelReason',
        'cancelled',
        'date_begin',
        'date_end',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
        'cancelled' => 'boolean',
        'date_begin' => 'date',
        'date_end' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
