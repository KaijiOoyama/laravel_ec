<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー情報編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">
                                オーナー情報編集
                            </h1>
                        </div>
                        <div class="lg:w-2/2 md:w-2/3 mx-auto">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('admin.owners.update', [ "owner" => $owner->id ]) }}">
                                @method("PUT")
                                @csrf
                                <div class="-m-2 mx-auto">
                                    <div class="p-2 w-2/2 mx-auto" >
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                            <input type="text" id="name" name="name" value="{{ $owner->name }}"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-2/2 mx-auto">
                                        <div class="relative">
                                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                            <input type="email" id="email" name="email" value="{{ $owner->email }}"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-2/2 mx-auto">
                                        <div class="relative">
                                            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-2/2 mx-auto">
                                        <div class="relative">
                                            <label for="password_confirmation" class="leading-7 text-sm text-gray-600">Confirm Password</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-full mt-3 flex justify-around">
                                        <button type="button" onclick="location.href='{{ route('admin.owners.index') }}'" class="mx-auto text-white bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                            戻る
                                        </button>
                                        <button type="submit" class="mx-auto text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                            更新する
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
