<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * @copyright 2022 ito
 *
 * ecサイト:shopダミーデータ作成
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => '1',
                'name' => '店名1',
                'information' => '店舗情報',
                'filename' => 'sample1.jpg',
                'is_selling' => true
            ],
            [
                'owner_id' => '2',
                'name' => '店名2',
                'information' => '店舗情報',
                'filename' => 'sample2.jpg',
                'is_selling' => true
            ],
        ]);
    }
}
