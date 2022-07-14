<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー様一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="flex justify-end mb-3">
                                <button onclick="location.href='{{ route('admin.owners.create') }}'" class="text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">
                                    新規登録する
                                </button>
                            </div>
                            <div class="lg:w-3/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                name</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                email</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                created_at</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($owners as $owner)
                                            <tr>
                                                <td class="px-4 py-3">{{ $owner->name }}</td>
                                                <td class="px-4 py-3">{{ $owner->email }}</td>
                                                <td class="px-4 py-3">{{ $owner->created_at->diffForHumans() }}</td>
                                                <td class="w-24 h-20 text-center">
                                                    <button onclick="location.href='{{ route('admin.owners.edit', [ 'owner' => $owner->id ]) }}'" class="mx-auto text-white bg-purple-500 border-0 py-2 px-2 focus:outline-none hover:bg-purple-600 rounded">
                                                        更新する
                                                    </button>
                                                </td>
                                                <form id="delete_{{$owner->id}}" action="{{ route('admin.owners.destroy', ['owner' => $owner->id ]) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <td class="w-24 h-20 text-center">
                                                        <a data-id="{{$owner->id}}" onclick="deletePost(this)" href="#" class="mx-auto text-white bg-red-500 border-0 py-2 px-2 focus:outline-none hover:bg-purple-600 rounded">
                                                            削除
                                                        </a>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $owners->links() }}
                            </div>
                        </div>
                    </section>
                    {{-- エロクアント
                    @foreach ($e_all as $e_owner)
                        {{ $e_owner->name }}
                        {{ $e_owner->created_at->diffForHumans() }}
                    @endforeach
                    <br>
                    クエリビルダ
                    @foreach ($db_all as $d_owner)
                        {{ $d_owner->name }}
                        {{ Carbon\Carbon::parse($d_owner->created_at)->diffForHumans() }}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if(confirm('本当に削除してよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
