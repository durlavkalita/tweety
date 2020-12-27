<div class="border border-gray-300 rounded-lg">
  @forelse ($tweets as $tweet)
    @include('_tweet')
  @empty
    <p class="p-4">Nothing yet, tweet something.</p>
  @endforelse
  {{ $tweets->links()}}
</div>