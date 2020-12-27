<h3 class="font-bold text-xl mb-2">Following</h3>

<ul>
  <li>
    @forelse (auth()->user()->follows as $user)
      <a href="{{route('users.show', $user)}}">
        <div class="flex items-center mb-2 bg-blue-100 p-2 rounded-lg">
          <img 
          src="{{$user->avatar}}""
          class="rounded-full mr-2" 
          alt="avatar"
          width="40"
          height="40"
          >
          {{$user->name}}
        </div>
      </a>
      @empty
      <p class="p-2">No friends yet</p>
    @endforelse
  </li>
</ul>