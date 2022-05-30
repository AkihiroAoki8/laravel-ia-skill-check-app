編集<br>
@if($errors->any())
@foreach($errors->all() as $error)
<div>{{$error}}</div>
@endforeach

@endif
<a href="{{route('department.show',['id'=>$department->id])}}">戻る</a>
<form method="post" action="{{route('department.update',$department->id)}}">
  @csrf
  <label>部署名</label>
  <input type="text" name="title" value="{{$department->name}}"><br>
  

  <input id="non_visible" type="radio" name="is_visible" value=0>
  <label for="non_visible">非表示にする</label>
  <button>更新する</button>
</form>

