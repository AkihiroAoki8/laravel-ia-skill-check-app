<h1>スキル一覧</h1>

@if(session('flash_message'))
  <div>{{ session('flash_message') }}</div>
@endif

<ul>
	@foreach($user->skills as $skill)
		<li>{{ $skill->name }} : {{ $skill->pivot->point }}</li>
	@endforeach
</ul>
