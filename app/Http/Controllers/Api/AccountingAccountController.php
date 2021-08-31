<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Models\AccountingAccount;
use App\Transformers\AccountingAccount\AccountingAccountTransformer;

class AccountingAccountController extends Controller
{
    public function index()
    {
        $aa = AccountingAccount::orderBy('name')->get();

        $accounting_accounts = fractal($aa, new AccountingAccountTransformer())->toArray()['data'];

        return response()->json($accounting_accounts, 200);
    }

    public function son_provider(Request $request)
    {
        $validate = request()->validate([
            'name' => 'required|unique:accounting_accounts,name'
        ]);
        
        $parent_account = 211001;

        $count = AccountingAccount::where('parent_account', $parent_account)->count();

        $new_account = $parent_account + $count + 1;

        $aa = new AccountingAccount;
        $aa->account = $new_account;
        $aa->imputable = 'S';
        $aa->name = strtoupper(request()->name);
        $aa->parent_account = $parent_account;
        $aa->updated_at = null;
        $aa->created_at = null;
        $aa->save();
        $aa->refresh();

        return response()->json($aa, 201);


    }
}
