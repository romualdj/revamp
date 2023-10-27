<?php


namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUserCustomer extends Pivot
{
    protected $table = 'role_user_customer';
    public $incrementing = true;


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
