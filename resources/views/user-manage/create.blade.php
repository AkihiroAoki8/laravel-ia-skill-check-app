<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('社員の追加') }}
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
            <form action="{{Route('user-manage.store')}}" method="get">
                <div>
                    <label for="name">名前</label>
                    <input type="text" name="name" value="{{old('name')}}" />
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="text" name="email" value="{{old('email')}}" />
                </div>
                <div>
                    <label for="role">権限</label>
                    <select name="role">
                        <option value="1" {{old("role") === 1 ? "selected" : ""}}>{{config("const.role.1")}}</option>
                        <option value="5" {{old("role") === 5 ? "selected" : ""}}>{{config("const.role.5")}}</option>
                        <option value="10" {{old("role") === 10 ? "selected" : ""}}>{{config("const.role.10")}}</option>
                    </select>
                </div>
                <div>
                    <label for="department">部署</label>
                    <select name="department">
                        @foreach($departments as $index => $department)
                        <option value="{{$index + 1}}" {{old("department") == $index + 1 ? "selected" : ""}}>
                            {{$department}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">編集</button>
        </div>
    </div>
</x-app-layout>