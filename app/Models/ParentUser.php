<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\HasApiTokens;

class ParentUser extends Model
{
    use HasApiTokens, HasFactory;
    /**
     * Here ParentUser will register using his name,e-mail,phone_number,address,gender,pan_card and password for the application and these Columns are store in ParentUser database, also these columns are calls in parentUserController.
     *
     * @param ParentUser $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'address',
        'gender',
        'pan_card',
        'is_approved',
    ];
    protected $hidden =[
        'password',
        'remember_token'
    ];

}
