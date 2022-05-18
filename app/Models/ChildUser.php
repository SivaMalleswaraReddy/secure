<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ChildUser extends Model
{
    use HasFactory;
    /**
     * Here ChildUser will register using his first_name,last_name, e-mail,phone_number,address,dob,gender, monthly_limit and password for the application and these Columns are store in ChildUser database, also these columns are calls in ChildUserController.
     *
     * @param ChildUser $fillable
     * @return JsonResponse
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email',
        'phone_number',
        'gender',
        'monthly_limit',
        'is_approved',
        'parent_id'
    ];
}
