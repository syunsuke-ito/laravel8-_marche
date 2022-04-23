<?php

declare(strict_types=1);

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

/**
 * @copyright 2022 ito
 *
 * ecサイト:shopコントローラー
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */

class ShopController extends Controller
{
    /**
     * ShopController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            // dd($request->route()->parameter('shop')); //文字列
            // dd(Auth::id()); 数字

            $id = $request->route()->parameter('shop');
            if (null !== $id) {
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id();
                if ($shopId !== $ownerId) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }

    /**
     * index表示.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ownerId = Auth::id();
        $shops = Shop::where('owner_id', $ownerId)->get();

        return view('owner.shops.index', compact('shops'));
    }

    /**
     * 画像編集画面.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UploadImageRequest $request
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->image;
        if (null !== $imageFile && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'shops');
            // Storage::putFile('public/shops', $imageFile); リサイズなしの場合

        }

        return redirect()->route('owner.shops.index');
    }
}