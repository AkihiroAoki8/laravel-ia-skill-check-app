<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('社員の編集') }}
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <form action="{{Route('user-manage.update', ['id' => $user->id] )}}" method="get">
                <div>
                    <label for="name">名前</label>
                    <input type="text" name="name" value="{{old('name') ? old('name') : $user->name}}" />
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="text" name="email" value="{{old('email') ? old('email') : $user->email}}" />
                </div>
                <div>
                    <label for="role">権限</label>
                    <select name="role">
                        <option value="1" {{$user->role === 1 ? "selected" : ""}}>{{config("const.role.1")}}</option>
                        <option value="5" {{$user->role === 5 ? "selected" : ""}}>{{config("const.role.5")}}</option>
                        <option value="10" {{$user->role === 10 ? "selected" : ""}}>{{config("const.role.10")}}</option>
                    </select>
                </div>
                <div>
                    <label for="department">部署</label>
                    <select name="department">
                        @foreach($departments as $index => $department)
                        <option value="{{$index + 1}}" {{$user->department_id == $index + 1 ? "selected" : ""}}>
                            {{$department}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">編集</button>
            </form>
        </div>
    </div>
</x-app-layout>