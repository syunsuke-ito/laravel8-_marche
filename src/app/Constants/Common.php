<?php declare(strict_types=1);

namespace App\Constants;

/**
 * @copyright 2022 ito
 *
 * ecサイト:定数クラス
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class Common
{
    const PRODUCT_ADD = '1';
    const PRODUCT_REDUCE = '2';

    const PRODUCT_LIST = [
        'add' => self::PRODUCT_ADD,
        'reduce' => self::PRODUCT_REDUCE
    ];
}
