<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Payment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPaymentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_user_payments()
    {
        $user = User::factory()->create();
        $payments = Payment::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.payments.index', $user));

        $response->assertOk()->assertSee($payments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_user_payments()
    {
        $user = User::factory()->create();
        $data = Payment::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.payments.store', $user),
            $data
        );

        unset($data['date']);
        unset($data['value']);
        unset($data['description']);
        unset($data['supplier']);
        unset($data['user_id']);
        unset($data['company_id']);
        unset($data['result']);
        unset($data['errCode']);
        unset($data['errorDescription']);
        unset($data['userPaymentOptionId']);
        unset($data['ccCardNumber']);
        unset($data['bin']);
        unset($data['last4Digits']);
        unset($data['ccExpMonth']);
        unset($data['ccExpYear']);
        unset($data['transactionId']);
        unset($data['threeDReason']);
        unset($data['threeDReasonId']);
        unset($data['challengeCancelReasonId']);
        unset($data['challengeCancelReason']);
        unset($data['cancelled']);
        unset($data['date_begin']);
        unset($data['date_end']);

        $this->assertDatabaseHas('payments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $payment = Payment::latest('id')->first();

        $this->assertEquals($user->id, $payment->user_id);
    }
}
