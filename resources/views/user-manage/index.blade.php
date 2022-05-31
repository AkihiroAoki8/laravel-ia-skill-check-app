<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('部内社員一覧') }}
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            <a href="{{Route('user-manage.create')}}">社員を追加</a>
        </div>
    </div>
</x-app-layout>