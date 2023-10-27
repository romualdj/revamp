<?php


namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    protected $table = 'role_user';

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(
            Customer::class,
            'role_user_customer',
            'role_user_id'
        )
            ->using(RoleUserCustomer::class)
            ->as('role_user_customer');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
