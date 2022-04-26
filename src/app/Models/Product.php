<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\Image;

/**
 * @copyright 2022 ito
 *
 * ecサイト:Productモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Product extends Model
{
    use HasFactory;

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function imageFirst()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
    }
}
