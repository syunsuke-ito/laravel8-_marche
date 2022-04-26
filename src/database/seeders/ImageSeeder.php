<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * @copyright 2022 ito
 *
 * ecサイト:imageダミーデータ作成
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => '1',
                'filename' => 'sample1.jpg',
                'title' => null
            ],
            [
                'owner_id' => '1',
                'filename' => 'sample2.jpg',
                'title' => null
            ],
            [
                'owner_id' => '1',
                'filename' => 'sample3.jpg',
                'title' => null
            ],
            [
                'owner_id' => '1',
                'filename' => 'sample4.jpg',
                'title' => null
            ],
            [
                'owner_id' => '1',
                'filename' => 'sample5.jpg',
                'title' => null
            ],
            [
                'owner_id' => '1',
                'filename' => 'sample6.jpg',
                'title' => null
            ]
        ]);
    }
}
