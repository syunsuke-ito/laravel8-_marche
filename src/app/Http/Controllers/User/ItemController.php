<?php declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @copyright 2022 ito
 *
 * ecサイト:Itemコントローラー
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class ItemController extends Controller
{
    /**
     * index表示.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }
}
