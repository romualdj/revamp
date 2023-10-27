<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\RoleUserCustomer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::factory()->count(5)->create();
        $customers = Customer::factory()->count(10)->create();
        $users = User::factory()->hasAttached($roles->random(1))->count(2)->create();

        $userRolePivot = $users->random()->roles->random()->pivot;


        RoleUserCustomer::create([
            app(RoleUser::class)->customers()->getForeignPivotKeyName() =>  $userRolePivot->getKey(),
            'customer_id' => $customers->random()->getKey()
        ]);
    }
}
