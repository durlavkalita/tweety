<x-app-layout>
  <form enctype="multipart/form-data" action="{{route('users.update', $user)}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="name">Name</label>
      <input
      class="border border-gray-400 p-2 w-full rounded-lg" 
      type="text"
      name="name"
      id="name"
      value="{{$user->name}}"
      required
      >
      @error('name')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="username">Username</label>
      <input
      class="border border-gray-400 p-2 w-full rounded-lg" 
      type="text"
      name="username"
      id="username"
      value="{{$user->username}}"
      required
      >
      @error('username')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="email">Email</label>
      <input
      class="border border-gray-400 p-2 w-full rounded-lg" 
      type="email"
      name="email"
      id="email"
      value="{{$user->email}}"
      required
      >
      @error('email')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="description">Description</label>
      <textarea name="description" id="description" class="border border-gray-400 p-2 w-full rounded-lg"></textarea>
      @error('description')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="password">Password</label>
      <input
      class="border border-gray-400 p-2 w-full rounded-lg" 
      type="password"
      name="password"
      id="password"
      required
      >
      @error('password')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
      class="block mb-2 uppercase font-bold text-xs text-gray-700"
      for="password_confirmation">Confirm Password</label>
      <input
      class="border border-gray-400 p-2 w-full rounded-lg" 
      type="password"
      name="password_confirmation"
      id="password_confirmation"
      required
      >
      @error('password_confirmation')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="avatar" 
        >Avatar</label>
      <div class="flex">
        <input type="file" name="avatar" id="avatar">
        <img src="{{$user->avatar}}" alt="Your avatar" width="40"/>
      </div>
      @error('avatar')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label 
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="banner" 
        >Banner</label>
      <div class="flex">
        <input type="file" name="banner" id="banner">
        <img src="{{$user->banner}}" alt="Your banner" width="40"/>
      </div>
      @error('banner')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <button type="submit" class="border bg-blue-500 text-white px-2 py-1 mr-4 rounded-lg">Submit</button>
      <a href="{{route('users.show', $user)}}" class="border hover:bg-gray-300 px-2 py-1 rounded-lg">Cancel</a>
    </div>
  </form>
</x-app-layout>