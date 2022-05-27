<h1>スキル一覧</h1>
@foreach($skills as $skill)
{{$skill->name}}<br>
@endforeach

<a href="{{route('skills.create')}}">スキルを追加する</a>


