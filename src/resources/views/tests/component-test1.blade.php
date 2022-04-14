<x-tests.app>
    <x-slot name="header">
        ヘッダー１
    </x-slot>
    test1
    <x-tests.card title="タイトル" content="本文" :message="$message"/>
    <x-tests.card title="タイトル2"/>
    <x-tests.card title="CSSを変更したい" class="bg-red-400"/>
</x-tests.app>
