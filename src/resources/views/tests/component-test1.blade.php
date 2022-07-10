<x-tests.app>
    <x-slot name="header">
        ヘッダー１
    </x-slot>
    <h1>テスト１</h1>

    <x-tests.card title="タイトル１" content="本文１" :message="$message"/>
    <x-tests.card />
</x-tests.app>
