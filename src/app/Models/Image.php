<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
/**
 * @copyright 2022 ito
 *
 * ecサイト:imageモデル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'filename',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
