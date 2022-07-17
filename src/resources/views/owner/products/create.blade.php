<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('owner.products.store') }}">
                        @csrf
                        <div class="-m-2 mx-auto">
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">information</label>
                                    <textarea  id="information" name="information" required rows="10"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" >
                                        {{ old('information') }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="price" class="leading-7 text-sm text-gray-600">price</label>
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="sort_order" class="leading-7 text-sm text-gray-600">sort order</label>
                                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="quantity" class="leading-7 text-sm text-gray-600">quantity</label>
                                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <select name="shop_id">
                                        @foreach ($shops as $shop)
                                            <option value="{{ $shop->id }}">
                                                {{ $shop->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <select name="category">
                                        @foreach ($categories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->secondary as $secondary)
                                                    <option value="{{ $secondary->id }}">
                                                        {{ $secondary->name }}
                                                    </option>
                                                @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <x-select-image name="image1" :images="$images" />
                        <x-select-image name="image2" :images="$images" />
                        <x-select-image name="image3" :images="$images" />
                        <x-select-image name="image4" :images="$images" />
                        <x-select-image name="image5" :images="$images" />
                        <div class="p-2 w-2/2 mx-auto" >
                            <div class="relative flex justify-around">
                                <div>
                                    <input type="radio" name="is_selling" value="1" checked> selling
                                </div>
                                <div>
                                    <input type="radio" name="is_selling" value="0"> stop
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full mt-3 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('owner.products.index') }}'"
                                class="mx-auto text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                戻る
                            </button>
                            <button type="submit"
                                class="mx-auto text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                登録する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        'use strict'
        const images = document.querySelectorAll('.image'); //全てのimageタグを取得
        images.forEach(image => { // 1つずつ繰り返す
                    image.addEventListener('click', function(e) { // クリックしたら
                            console.log('event');
                            const imageName = e.target.dataset.id.substr(0, 6); //data-idの6文字
                            const imageId = e.target.dataset.id.replace(imageName + '_', ' '); // 6文字カット
                                const imageFile = e.target.dataset.file;
                                const imagePath = e.target.dataset.path;
                                const modal = e.target.dataset.modal;
                                // サムネイルと input type=hiddenのvalueに設定
                                document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile;
                                document.getElementById(imageName + '_hidden').value = imageId;
                                MicroModal.close(modal); //モーダルを閉じる
                            })
                    });
    </script>
</x-app-layout>
