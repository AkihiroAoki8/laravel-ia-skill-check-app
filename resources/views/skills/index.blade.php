<x-app-layout>
  <x-slot name="header">
    <h1>スキル一覧</h1>

  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          @if(session('flash_message'))
          <div>{{session('flash_message')}}</div>
          @endif


          @foreach($skills as $skill)
          <div>
            {{$skill->name}}
          </div>
          <br>

          @can("admin-only")
          <x-button class="mb-4">
            <a href="{{route('skills.edit',['id'=>$skill->id])}}">更新する</a>
          </x-button>
          @endcan
          <form method="post" action="{{route('skills.delete',['id'=>$skill->id])}}">
            @csrf
            @can("admin-only")
            <x-button>削除する</x-button>
            @endcan
          </form>
          <br>
          @endforeach

          <x-button class="mb-4 primary">
            <a href="{{route('skills.create')}}">スキルを追加する</a>
          </x-button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>