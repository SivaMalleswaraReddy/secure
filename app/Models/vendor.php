<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class vendor extends Model
{
    use HasFactory;
    /**
     * Here Vendor will Register using his name,email,phone_number,password, and address for the application and these Columns are store in vendor database, also these columns are calls in VendorController.
     *
     * @param vendor $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'address',

    ];
}
