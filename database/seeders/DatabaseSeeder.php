<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(ConfigSeeder::class);

        $this->call(ProductSeeder::class);
        $this->call(ProductDetailSeeder::class);
    }
}
