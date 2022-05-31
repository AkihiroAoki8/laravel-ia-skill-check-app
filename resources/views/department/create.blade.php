部署登録

<form method="post" action="{{route('departments.store')}}">
  @csrf
  <label>部署名</label>
  <input type="text" name="name" value="{{old('title')}}"><br>
 
  <input id="visible" checked type="radio" name="is_displayed" value=1>
  <label for="visible">表示する</label>
  <input id="non_visible" type="radio" name="is_displayed" value=0>
  <label for="non_visible">非表示にする</label>
  <button>登録</button>
</form>