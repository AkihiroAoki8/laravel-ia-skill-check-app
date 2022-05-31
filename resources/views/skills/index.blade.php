@if(session('flash_message'))
<div>{{session('flash_message')}}</div>
@endif

<h1>スキル一覧</h1>
@foreach($skills as $skill)
{{$skill->name}}
<a href="{{route('skills.edit',['id'=>$skill->id])}}">更新する</a>
<form method="post" action="{{route('skills.delete',['id'=>$skill->id])}}">
  @csrf
  <button>削除する</button>
</form>
<br>
@endforeach

<a href="{{route('skills.create')}}">スキルを追加する</a>


