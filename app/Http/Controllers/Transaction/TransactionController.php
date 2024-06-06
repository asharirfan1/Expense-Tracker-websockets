<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Models\Transaction;
use App\Services\UtilService;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    public function index(UtilService $utilService)
    {
        $transactions = Transaction::all();
        return $utilService->makeResponse($transactions, 'Transactions fetched successfully');
    }


    public function store(UtilService $utilService, CreateTransactionRequest $request): array
    {
        $transaction = Transaction::create($request->validated());
        return $utilService->makeResponse($transaction, "transaction stored successfully");
    }


    public function destroy(UtilService $utilService, Transaction $transaction): array
    {
        $transaction->delete();
        return $utilService->makeResponse($transaction, "transaction deleted successfully");
    }
}
