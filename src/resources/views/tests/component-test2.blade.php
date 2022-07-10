<x-tests.app>
    <x-slot name="header">
        ヘッダー2
    </x-slot>
    <h1>テスト2</h1>

    <x-test-class-base classBaseMessage="クラスベースのメッセージです"/>
    <div class="mb-4"></div>
    <x-test-class-base classBaseMessage="クラスベースのメッセージです" defaultMessage="初期値から変更しています"/>
</x-tests.app>
