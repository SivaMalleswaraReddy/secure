<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Card extends Model
{
    use HasFactory;
    /**
     * Here Card will Generate using his card_number, exp_date, cvv and Child_id for the application and these Columns are store in Card database, also these columns are calls in CardController.
     *
     * @param Card $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'card_number',
        'exp_date',
        'cvv',
        'child_id'
    ];
}
