<?php

declare(strict_types=1);

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;


/**
 * @copyright 2022 ito
 *
 * ecサイト:imageコントローラー
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class ImageController extends Controller
{
    /**
     * ShopController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('image');
            if (null !== $id) {
                $imagesOwnerId = Image::findOrFail($id)->owner->id;
                $imageId = (int)$imagesOwnerId;
                if ($imageId !== Auth::id()) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = Image::where('owner_id', Auth::id())
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        return view('owner.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('owner.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\UploadImageRequest $request
     * @return \Illuminate\View\View
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if (null !== $imageFiles) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore = ImageService::upload($imageFile, 'products');
                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' => $fileNameToStore
                ]);
            }
        }

        return redirect()
            ->route('owner.images.index')
            ->with([
                'message' => '画像登録を実施しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('owner.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['string', 'max:50'],
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
            ->route('owner.images.index')
            ->with([
                'message' => '画像情報を情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/products/' . $image->filename;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        Image::findOrFail($id)->delete();

        return redirect()
            ->route('owner.images.index')
            ->with([
                'message' => '画像を削除しました。',
                'status' => 'alert'
            ]);
    }
}
