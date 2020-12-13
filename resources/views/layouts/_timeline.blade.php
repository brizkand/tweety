<div class="border border-gray-300 rounded-lg">
    @forelse($tweets as $tweet)
        @include('layouts._tweet')
    @empty
        <p class="p-4">No tweets yet!</p>
    @endforelse

    {{$tweets->links()}}
</div>