@unless (auth()->user()->is($user))
  <form action="/users/{{$user->username}}/follow" method="POST">
    @csrf
    <button type="submit" 
    class="{{auth()->user()->following($user) ? 'bg-gray-700' : 'bg-green-700'}}
    rounded-full shadow p-2 text-white text-xs hover:bg-blue-400">
      {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
  </form>
@endunless