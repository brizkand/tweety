<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/cover.png" alt="Cover Photo"
                class="mb-2 rounded-lg"
            >

            <img src="{{$user->avatar}}" 
                alt="Avatar"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left:50%"
                width="150"
            >

        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                <!-- @if(current_user()->is($user)) -->
                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 mr-2 py-2 px-4 text-black text-xm" type="submit">Edit Profile</a>
                <!-- @endif -->
                @endcan
                <x-follow-button :user="$user">
                </x-follow-button>
            </div>
        </div>

        <p class="text-sm">I'm John Doe Web Developer from California. I love to create something that can reduce human works. Something Something Something Something SomethingSomethingSomething SomethingSomethingSomethingvSomethingSomething Something</p>

    </header>
    <hr>
    @include('layouts._timeline', ['tweets' => $tweets])
</x-app>
