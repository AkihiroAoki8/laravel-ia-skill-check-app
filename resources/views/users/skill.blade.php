<h1>スキル一覧</h1>
<ul>
	@foreach($user->skills as $skill)
		<li>{{ $skill->name }} : {{ $skill->pivot->point }}</li>
	@endforeach
</ul>
