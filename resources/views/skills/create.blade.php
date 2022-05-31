<x-app-layout>
  <x-slot name="header">
    <h1>スキル追加</h1>

  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <form method="post" action="{{route('skills.store')}}">
            @csrf
            <input type="text" name="name">
            <x-button>追加する</x-button>
          </form>
          <x-button class="mb-4 mt-8 primary">
            <a href="{{route('skills.index')}}">topに戻る</a>
          </x-button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>