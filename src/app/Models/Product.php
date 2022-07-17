<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Stock;

class Product extends Model
{
    use HasFactory;

    public function shop () {
        return $this->belongsTo(Shop::class);
    }

    public function category() {
        // カテゴリー１：商品(product)多
        //の関係なのでカテゴリクラスを指定し、productsテーブル内のカテゴリと紐付いているカラムをしていする
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    public function imageFirst() {
        // 画像１：商品(product)多
        //の関係なのでイメージクラスを指定し、productsテーブル内のイメージと紐付いているカラムをしていする
        // またカラム名がテーブル_idの書式ではないため親テーブルのidとひもずいていることを明示的に指定する必要がある
        return $this->belongsTo(Image::class, 'image1', 'id');
    }

    public function stock() {
        return $this->hasMany(Stock::class);
    }
}
