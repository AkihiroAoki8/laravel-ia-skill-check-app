@if(session('flash_message'))
<div>{{session('flash_message')}}</div>
@endif

<h1>スキル一覧</h1>





@foreach($skills as $skill)
{{$skill->name}}
@can("admin-only")
<a href="{{route('skills.edit',['id'=>$skill->id])}}">更新する</a>
@endcan
<form method="post" action="{{route('skills.delete',['id'=>$skill->id])}}">
  @csrf
  @can("admin-only")
  <button>削除する</button>
  @endcan
</form>
<br>
@endforeach

<a href="{{route('skills.create')}}">スキルを追加する</a>


