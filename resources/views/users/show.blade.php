<x-app-layout>
  <header class="mb-6 relative">
    <div class="relative">  
      <img 
      src="{{$user->banner}}" 
      alt="banner" 
      class="rounded-lg"
      />
      <img 
      src="{{$user->avatar}}" 
      alt=""
      class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
      style="left: 50%; border-radius: 50%;"
      height="150"
      width="150"
      />
    </div>

    <div class="flex justify-between items-center mb-8">
      <div style="max-width: 270px">
        <h2 class="font-blod text-2xl">{{$user->name}}</h2>
        <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
      </div>
      <div class="flex">
        @if (auth()->user()->is($user))
        <a href="{{route('users.edit', $user)}}" class="rounded-full shadow p-2 border-gray-300 text-black text-xs mr-2">Edit Profile</a>
        @endif
        <x-follow-button :user="$user"></x-follow-button>
      </div>
    </div>

    <p class="text-sm">
      {{$user->description ? $user->description : 'add description go to edit'}}
    </p>

  </header>

  @include('_timeline', [
    'tweets' => $tweets
  ])
</x-app-layout>