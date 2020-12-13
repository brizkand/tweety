<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold mb-4 text-xl">Following</h3>

    <ul>
        @forelse(auth()->user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4'}}">
                <div>
                    <a href="{{ route('profile', $user->username) }}"
                        class="flex items-center text-sm">
                        <img src="{{ $user->avatar }}" 
                            alt="Avatar"
                            class="rounded-full mr-2"
                            width="40"
                            height="40"
                            >
                            {{$user->name}}
                    </a>
                </div>
            </li>
        @empty
            <ul>No friends yet!</ul>
        @endforelse
    </ul>
</div>