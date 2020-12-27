@unless (auth()->user()->is($user))
  <form action="/users/{{$user->username}}/follow" method="POST">
    @csrf
    <button type="submit" 
    class="bg-blue-500 rounded-full shadow p-2 text-white text-xs">
      {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
  </form>
@endunless