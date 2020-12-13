<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input value="{{$user->name}}"type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" required>

            @error('name')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>

            <input value="{{$user->username}}" type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Avatar
            </label>
            <div class="flex">        
                <input value="{{$user->avatar}}" type="file" class="border border-gray-400 p-2 w-full" name="avatar" id="avatar">

                <img src="{{$user->avatar}}" alt="Profile Image" width="40">

            </div>
            @error('avatar')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input value="{{$user->email}}" type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" required>

            @error('email')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>

            @error('password')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Confirm Password
            </label>

            <input type="password_confirmation" class="border border-gray-400 p-2 w-full" name="password_confirmation" id="password_confirmation" required>

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounde py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>
            <a href="{{$user->path()}}" class="hover:underline">Cancel</a>
        </div>

    </form>
</x-app>