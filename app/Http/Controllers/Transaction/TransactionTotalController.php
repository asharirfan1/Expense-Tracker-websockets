<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\UtilService;

class TransactionTotalController extends Controller
{
    public function index(UtilService $utilService): array
    {
        $transactionsSum = Transaction::getTotalTransactionAmount();
        return  $utilService->makeResponse($transactionsSum , "total amount fetched");
    }
}
