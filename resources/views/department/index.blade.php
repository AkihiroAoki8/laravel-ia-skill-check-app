部署一覧<br>
@foreach($departments as $department)
{{$department->name}}
<a href="{{ route('departments.show',['id'=>$department->id]) }}">詳細</a><br>
@endforeach

<a href="{{ route('departments.create') }}">社員登録</a>