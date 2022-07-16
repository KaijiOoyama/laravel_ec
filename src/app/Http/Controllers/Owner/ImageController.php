<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth:owners'); // コンストラクタにミドルウェアを読ませることで認証の確認ができる
        $this->middleware(function ($request, $next) {
            $targetImageId = $request->route()->parameter('image');
            if(!is_null($targetImageId)) {
                if((int) Image::findOrFail($targetImageId)->owner->id !== Auth::id()) abort(404);
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $file) {
                $filename = ImageService::upload($file, 'products');
                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' => $filename
                ]);
            }
        }

        return redirect()
            ->route("owner.images.index")
            ->with(["message" => "Image upload successfully!!", "status" => "info"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('owner.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:50'
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
            ->route("owner.images.index")
            ->with(["message" => "image title update successfully!!", "status" => "info"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filepath = 'public/products/' . $image->filename;
        if(Storage::exists($filepath)) {
            Storage::delete($filepath);
        }

        Image::findOrFail($id)->delete();
        return redirect()
            ->route("owner.images.index")
            ->with([ "message" => "Image delete successfully!!", "status" => "alert" ]);
    }
}
