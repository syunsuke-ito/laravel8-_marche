<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\Image;
use App\Models\Stock;
use App\Models\User;

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shop_id',
        'name',
        'information',
        'price',
        'is_selling',
        'sort_order',
        'secondary_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

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
    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function imageSecond()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
    }
    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function imageThird()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
    }
    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function imageFourth()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
    }

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    /**
     * リレーションの定義
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot(['id', 'quantity']);
    }
}
