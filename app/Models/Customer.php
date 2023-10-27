<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user_customer',
            'customer_id',
            app(RoleUser::class)->customers()->getForeignPivotKeyName()
        )
            ->using(RoleUserCustomer::class)
            ->as('role_user_customer')
            ->withPivot([ 'id']);

    }

    public function roleUsers ()
    {
        return $this->hasManyThrough(RoleUser::class,
            RoleUserCustomer::class,
            'customer_id',
            'id',
            'id',
            app(RoleUser::class)->customers()->getForeignPivotKeyName()
        );
    }
}
