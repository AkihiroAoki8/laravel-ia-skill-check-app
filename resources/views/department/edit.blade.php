<!-- 編集<br>
@if($errors->any())
@foreach($errors->all() as $error)
<div>{{$error}}</div>
@endforeach

@endif -->
<a href="{{route('departments.show',['id'=>$department->id])}}">戻る</a>
<form method="post" action="{{route('departments.update',$department->id)}}">
  @csrf
  <label>部署名</label>
  <input type="text" name="name" value="{{$department->name}}"><br>
  

  <input id="non_visible" type="radio" @if($show == 1)checked @endif name="is_displayed" value=1>
  <label for="is_visible">表示する</label>
  <input id="non_visible" type="radio" @if($show == 0)checked @endif name="is_displayed" value=0>
  <label for="non_visible">非表示にする</label>
  <button>更新する</button>
</form>

