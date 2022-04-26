<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @copyright 2022 ito
 *
 * ecサイト:Stockモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Stock extends Model
{
    use HasFactory;

    protected $table = 't_stocks';
}
