<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        Position::factory()->count(5)->create();
        Employee::factory()
            ->count(1000)
            ->sequence(
                ['headmen_id' => null],
                ['headmen_id' => 1],
                ['headmen_id' => 2],
                ['headmen_id' => 3],
                ['headmen_id' => 4],
                ['headmen_id' => 5],
            )
            ->create();
    }
}
