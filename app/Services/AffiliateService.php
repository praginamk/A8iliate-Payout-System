<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;
use App\Models\Commission;

class AffiliateService
{
    protected $commissionRates = [
        1 => 0.10, // Level 1: 10%
        2 => 0.05, // Level 2: 5%
        3 => 0.03, // Level 3: 3%
        4 => 0.02, // Level 4: 2%
        5 => 0.01, // Level 5: 1%
    ];

    public function distributeCommissions(User $user, Sale $sale)
    {
        $currentUser = $user;
        $level = 1;

        while ($level <= 5 && $currentUser->parent) {
            $parent = $currentUser->parent;

            if (isset($this->commissionRates[$level])) {
                $commissionAmount = $sale->amount * $this->commissionRates[$level];
                Commission::create([
                    'sale_id' => $sale->id,
                    'user_id' => $parent->id,
                    'commission_amount' => $commissionAmount,
                    'level' => $level,
                ]);
            }
            $currentUser = $parent;
            $level++;
        }
    }
}
