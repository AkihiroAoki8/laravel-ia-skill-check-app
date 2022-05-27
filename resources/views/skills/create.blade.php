<form method="post" action="{{route('skills.store')}}">
@csrf
<input type="text" name="name">
<button>追加する</button>
</form>