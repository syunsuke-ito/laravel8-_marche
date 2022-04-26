<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrimaryCategory;

/**
 * @copyright 2022 ito
 *
 * ecサイト:SecondaryCategoryモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class SecondaryCategory extends Model
{
    use HasFactory;

    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function primary()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }
}
