<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Transaction extends Model
{
    use HasFactory;
    /**
     * Here Transaction will generate using his vendor_name,card_number,transaction_amount,limit_balance,transaction_status and transaction_date for the application and these Columns are store in transaction database, also these columns are calls in TransactionController.
     *
     * @param Transaction $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_name',
        'card_number',
        'transaction_amount',
        'limit_balance',
        'transaction_status',
        'transaction_date',

    ];
}
