<div>
    <h1>ユーザー詳細</h1>
    <div>
        <h2>名前</h2>
        <div>{{$user->name}}</div>
        <h2>スキル</h2>
        @foreach($user->skills as $skill)
        <div>{{$skill->name}}</div>
        <div>ポイント：{{$skill->pivot->point}}</div>
        @endforeach
    </div>
</div>