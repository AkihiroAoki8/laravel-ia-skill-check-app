詳細<br>

id:{{$department->id}}<br>
部署:{{$department->name}}<br>
表示・非表示{{$department->is_displayed}}<br>


<a href="{{ route('departments.index') }}">部署一覧</a>
<a href="{{ route('departments.edit', ['id'=>$department->id]) }}">編集</a>

<form method="post" action="{{route('departments.delete',['id'=>$department->id])}}">
  @csrf
  <button>削除する</button>
</form>