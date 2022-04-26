<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

/**
 * @copyright 2022 ito
 *
 * ecサイト:Shopモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'name',
        'information',
        'filename',
        'is_selling'
    ];

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
