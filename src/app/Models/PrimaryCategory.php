<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryCategory;

/**
 * @copyright 2022 ito
 *
 * ecサイト:PrimaryCategoryモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class PrimaryCategory extends Model
{
    use HasFactory;

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function secondary()
    {
        return $this->hasMany(SecondaryCategory::class);
    }
}
