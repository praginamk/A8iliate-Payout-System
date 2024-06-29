<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\User;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AffiliateService;
class SalesController extends Controller
{
    protected $affiliateService;

    public function __construct(AffiliateService $affiliateService)
    {
        $this->affiliateService = $affiliateService;
    }
    public function create()
    {
        $users = User::all();
        return view('admin.sales.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $user1 = User::where('id', Auth::id())->firstOrFail();
         $amount=$request->amount;
         $currentUser = auth()->user();
         $amount_after_commission = $this->calculateAmountAfterCommission($amount,$currentUser);
        $sale =  Sale::create([
            'user_id' => Auth::id(),  
            'amount' => $amount,
            'amount_after_commission' =>$amount_after_commission 
        ]);
        (new AffiliateService)->distributeCommissions($user1, $sale);

         return redirect()->route('sales.create')->with('success', 'Sale recorded and commissions distributed successfully');
    }

    private function calculateAmountAfterCommission($amount, $user)
{
    $commissionRates = [
        1 => 0.10, // Level 1: 10%
        2 => 0.05, // Level 2: 5%
        3 => 0.03, // Level 3: 3%
        4 => 0.02, // Level 4: 2%
        5 => 0.01, // Level 5: 1%
    ];

    $amount_after_commission = $amount;
    for ($level = 1; $level <= 5; $level++) {
        if ($user->parent) {
            $amount_after_commission -= ($amount * $commissionRates[$level]);
            $user = $user->parent; 
        } else {
            break; 
        }
    }

    return $amount_after_commission;
}

        public function mysales()
        {
            $id=Auth::id();
           $data= Sale::where('user_id',$id)->get();
           return view('admin.sales.listsale',compact('data'));
        }

        public function payroll()
        {
            $userId=Auth::id();
            $sales = Sale::where('user_id', $userId)->get();
            $commissions = Commission::where('user_id', $userId)->get();
            $totalSalesAmount = $sales->sum('amount_after_commission');
            $totalCommissionAmount = $commissions->sum('commission_amount');
            return view('admin.sales.payroll', compact('totalSalesAmount', 'totalCommissionAmount'));
        }
    
}
