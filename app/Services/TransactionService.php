<?php
namespace App\Services;
use App\User;
use App\Transaction;
use App\Credit;
use DateTime;
class TransactionService extends BaseService {
    
    public function transaction($amount, $user, $gameId) {
        $bankAccount =  User::find($user['id'])->credit;
        $newTransaction = Transaction::insert($this->transactionFormat($bankAccount, $amount, $gameId));
        $this->updateCredit($bankAccount, $amount);
    }

    public function addTransaction() {

    }
    public function transactionFormat($bankAccount, $amount, $gameId, $action ='deduction') {
        $date = date_create();
        $transaction = new Transaction;
        $newBalance = $action == 'deduction' ? $bankAccount->balance - $amount:$bankAccount->balance + $amount;
        $transaction = [
            'credit_id' => $bankAccount->id,
            'transactionNumber' => date_format($date, 'U'),
            'currentBalance' => $bankAccount->balance,
            'newBalance' => $newBalance,
            'action' => $action,
            'amount' => $amount,
            'game_id' => $gameId,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]; 
        return $transaction;
    }

    public function updateCredit($bankAccount, $amount, $action='deduction') {
        $newBalance = $action == 'deduction' ? $bankAccount->balance - $amount:$bankAccount->balance + $amount;
        $updateParams = [
            'balance' => $newBalance,
            'updated_at' => new DateTime
        ];
        $credit = Credit::where('id', $bankAccount->id)->update($updateParams);
    }
}