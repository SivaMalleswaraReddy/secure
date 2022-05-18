<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class refunds extends Model
{
    use HasFactory;
    /**
     * Here Refunds will generate using his id,refund_amount,refund_status and refund_date for the application and these Columns are store in Refund database, also these columns are calls in RefundController.
     *
     * @param refunds $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'refund_amount',
        'refund_status',
        'refund_date',

    ];

}
