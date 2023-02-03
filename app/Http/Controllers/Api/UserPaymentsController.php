<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\PaymentCollection;

class UserPaymentsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $payments = $user
            ->payments()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaymentCollection($payments);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Payment::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'value' => ['required', 'numeric'],
            'description' => ['nullable', 'max:255', 'string'],
            'supplier' => ['required', 'max:255', 'string'],
            'company_id' => ['required', 'exists:companies,id'],
            'result' => ['required', 'max:255', 'string'],
            'errCode' => ['required', 'max:255', 'string'],
            'errorDescription' => ['required', 'max:255', 'string'],
            'userPaymentOptionId' => ['required', 'max:255', 'string'],
            'ccCardNumber' => ['required', 'max:255', 'string'],
            'bin' => ['required', 'max:255', 'string'],
            'last4Digits' => ['required', 'max:255', 'string'],
            'ccExpMonth' => ['required', 'max:255', 'string'],
            'ccExpYear' => ['required', 'max:255', 'string'],
            'transactionId' => ['required', 'max:255', 'string'],
            'threeDReason' => ['required', 'max:255', 'string'],
            'threeDReasonId' => ['required', 'max:255', 'string'],
            'challengeCancelReasonId' => ['required', 'max:255', 'string'],
            'challengeCancelReason' => ['required', 'max:255', 'string'],
            'cancelled' => ['required', 'boolean'],
            'date_begin' => ['required', 'date'],
            'date_end' => ['required', 'date'],
        ]);

        $payment = $user->payments()->create($validated);

        return new PaymentResource($payment);
    }
}
