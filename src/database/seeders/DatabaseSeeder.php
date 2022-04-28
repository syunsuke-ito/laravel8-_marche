<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * @copyright 2022 ito
 *
 * ecサイト:seeder
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
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
        $this->call([
            AdminSeeder::class,
            OwnerSeeder::class,
            ShopSeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            // ProductSeeder::class,
            // StockSeeder::class
        ]);
    }
}
