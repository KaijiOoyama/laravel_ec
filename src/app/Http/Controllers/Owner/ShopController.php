<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use InterventionImage;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware('auth:owners'); // コンストラクタにミドルウェアを読ませることで認証の確認ができる
        $this->middleware(function ($request, $next) {
            $targetShopId = $request->route()->parameter('shop');
            // ルートパラメータが存在すること
            if(!is_null($targetShopId)) {
                // ルートパラメータが存在する場合、ログインIDとパラメータのIDが一致しなければ404に飛ばす
                $targetShopOwnerId = (int) Shop::findOrFail($targetShopId)->owner->id;
                $loginOwnerId = Auth::id();
                if($targetShopOwnerId !== $loginOwnerId) abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view("owner.shops.edit", compact("shop"));
    }

    public function update(Request $request, $id)
    {
        $imageFile = $request->image;

        if(!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/shops', $imageFile);// リサイズなしの場合
            $filename = uniqid(rand() . '_') . '.' . $imageFile->extension();
            $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            Storage::put('public/shops/'. $filename, $resizedImage);
        }

        return redirect()
            ->route("owner.shops.index")
            ->with(["message" => "Shop update successfully!!", "status" => "info"]);
    }
}
