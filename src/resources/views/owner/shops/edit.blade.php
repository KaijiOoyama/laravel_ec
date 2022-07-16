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
                    <form method="POST" action="{{ route('owner.shops.update', ['shop' => $shop->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="-m-2 mx-auto">
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">shop name</label>
                                    <input type="text" id="name" name="name" value="{{ $shop->name }}" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">information</label>
                                    <textarea  id="information" name="information" required rows="10"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" >
                                        {{ $shop->information }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto" >
                                <div class="relative">
                                    <div class="w-32">
                                        <x-shop-thumbnail :filename="$shop->filename" />
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto" >
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">image</label>
                                    <input  accept="image/png, image/jpeg, image/jpg" type="file" id="image" name="image"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-2/2 mx-auto" >
                                <div class="relative flex justify-around">
                                    <div>
                                        <input type="radio" name="is_selling" value="1" @if($shop->is_selling === 1){ checked } @endif> selling
                                    </div>
                                    <div>
                                        <input type="radio" name="is_selling" value="0" @if($shop->is_selling === 0){ checked } @endif> stop
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full mt-3 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('owner.shops.index') }}'" class="mx-auto text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                戻る
                            </button>
                            <button type="submit" class="mx-auto text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                更新する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
