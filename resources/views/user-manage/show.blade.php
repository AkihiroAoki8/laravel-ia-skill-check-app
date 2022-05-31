<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('部内社員詳細') }}
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>名前</div>
                <div>{{$user->name}}</div>
                <div>スキル</div>
                @foreach($user->skills as $skill)
                <div>{{$skill->name}}</div>
                <div>ポイント：{{$skill->pivot->point}}</div>
                @endforeach
            </div>
            <div>
                <a href="{{Route('user-manage.edit', ['id' => $user->id])}}">編集</a>
                <a href="{{Route('user-manage.delete', ['id' => $user->id])}}">削除</a>
            </div>
        </div>
    </div>
</x-app-layout>