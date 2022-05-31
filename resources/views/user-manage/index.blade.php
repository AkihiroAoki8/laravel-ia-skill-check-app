<div>
    <h1>部内社員一覧</h1>
    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>email</th>
                <th>権限</th>
                <th>部署</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{Route('user-manage.show', ['id' => $user->id ])}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{config("const.role." . $user->role)}}</td>
                    <td>{{$user->department_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>