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
      <div class="flex justify-between"  style="width: 600px">
        <div>
          <h5 class="font-bold mb-4">
            <a href="{{route('users.show', $tweet->user)}}">
              {{ $tweet->user->name }}
            </a>
          </h5>
        </div>
        <div>
          @if (auth()->user()->is($tweet->user))
            <form action="{{route('tweets.destroy', $tweet)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">
                <i class="fas fa-trash text-red-500"></i>
              </button>
            </form>
          @endif
        </div>
      </div>
      <div class="flex justify-between">
        <p class="text-sm">
          {{ $tweet->body }}
        </p>
      </div>
      @if ($tweet->tweetImage != 'http://localhost:8000/')
        <img src="{{asset($tweet->tweetImage)}}" width="50%" class="mx-auto">
      @endif
      <x-like-buttons :tweet="$tweet"/>
  </div>
</div>