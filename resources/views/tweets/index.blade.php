<x-app-layout>
    @include('_publish-tweet-panel')
    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app-layout>
