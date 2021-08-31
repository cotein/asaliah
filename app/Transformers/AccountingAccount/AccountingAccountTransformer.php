<?php

namespace App\Transformers\AccountingAccount;

use App\Src\Models\AccountingAccount;
use League\Fractal\TransformerAbstract;

class AccountingAccountTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(AccountingAccount $aa)
    {
        return [
            'id' => $aa['id'],
            'account' => $aa['account'],
            'name' => strtoupper($aa['name']),
            'parent_account' => $aa['parent_account'],
        ];
    }
}
