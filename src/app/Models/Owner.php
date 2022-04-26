<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Shop;
use App\Models\Image;

/**
 * @copyright 2022 ito
 *
 * ecサイト:Ownerモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Owner extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    /**
     * Define a one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
