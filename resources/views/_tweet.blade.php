<div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-300'}}">
  <div class="mr-2 flex-shrink-0">
      <a href="{{route('users.show', $tweet->user)}}">
        <img 
        src="{{$tweet->user->avatar}}"
        class="rounded-full mr-2" 
        alt="avatar"
        width="50"
        height="50"
        >
      </a>
  </div>
  <div>
      <h5 class="font-bold mb-4">
        <a href="{{route('users.show', $tweet->user)}}">
          {{ $tweet->user->name }}
        </a>
      </h5>
      <p class="text-sm">
        {{ $tweet->body }}
      </p>
      <x-like-buttons :tweet="$tweet"/>
  </div>
</div>