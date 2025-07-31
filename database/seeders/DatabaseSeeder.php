<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pizza;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Users
        $users = [
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => bcrypt('password')],
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => bcrypt('password')],
        ];
        foreach ($users as $user) {
            User::create($user);
        }

        // Create Pizzas
        $pizzas = ['Margherita', 'Pepperoni', 'Veggie', 'Hawaiian'];
        foreach ($pizzas as $pizza) {
            Pizza::create(['name' => $pizza]);
        }

        // Attach Pizzas to Users
        $alice = User::where('name', 'Alice')->first();
        $bob = User::where('name', 'Bob')->first();
        $alice->favoritePizzas()->attach([1, 2]); // Alice likes Margherita, Pepperoni
        $bob->favoritePizzas()->attach([2, 3]); // Bob likes Pepperoni, Veggie
    }
}