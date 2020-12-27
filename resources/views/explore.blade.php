<x-app-layout>
  <div>
    @foreach ($users as $user)
      <a href="{{route('users.show', $user)}}" class="flex items-center mb-5">
        <img src="{{$user->avatar}}" 
        alt="{{$user->username}}'s avatar"
        width="60"
        height="60"
        class="mr-4 rounded"
        >
        <div>
          <h4 class="font-bold">{{'@'.$user->username}}</h4>
        </div>
      </a>
    @endforeach

    {{$users->links()}}
  </div>
</x-app-layout>