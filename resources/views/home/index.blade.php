<h1>ようこそ {{ $user->name }} さん</h1>
<a href="{{ route('users.skill', [ 'id' => $user->id ]) }}">スキル一覧</a>
