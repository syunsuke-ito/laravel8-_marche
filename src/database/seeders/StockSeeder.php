<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * @copyright 2022 ito
 *
 * ecサイト:StockSeeder ダミーデータ作成
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_stocks')->insert([
            [
                'product_id' => 1,
                'type' => 1,
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                'type' => 1,
                'quantity' => -2,
            ],
        ]);
    }
}
