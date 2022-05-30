<form method="post" action="{{route('skills.update',['id'=>$oldskill->id])}}">
@csrf
<input type="text" name="name" value="{{$oldskill->name}}">
<button>更新する</button>
</form>