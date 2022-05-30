<h1>スキル編集</h1>
<ul>
	@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
	@endif

	<form method="post" action="{{ route('users.request', [ 'id' => $user->id ])}}">
 		@csrf
		@foreach($user->skills as $skill)
			スキル名: {{ $skill->name }}<br>
			現在のポイント: {{ $skill->pivot->point }}<br>
			&#9658;
			変更後のポイント: <input type="text" name="{{ $skill }}" value="{{ $skill->pivot->point }}"><br><br> 
		@endforeach
		<button>確認</button>
</form>
</ul>
