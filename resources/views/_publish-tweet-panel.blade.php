<div class="border border-blue-400 rounded-lg py-4 px-4 mb-6">
  <form action="/tweets" method="POST">
    @csrf
      <textarea 
      name="body" 
      id="" 
      class="w-full border-none rounded-lg"
      placeholder="What's on your mind"
      required
      autofocus
      ></textarea>
      <hr class="my-2"/>
      <footer class="flex justify-between items-center">
          <img 
          src="{{auth()->user()->avatar}}"
          class="rounded-full mr-2" 
          alt="avatar"
          width="50"
          height="50"
          >
          <button 
          type="submit"
          class="bg-blue-500 rounded-lg shadow py-1 px-2 text-white h-10 hover:bg-blue-900"
          >Publish</button>
      </footer>
  </form>
  @error('body')
    <p class="mt-2 text-red-500 text-sm">{{$message}}</p>
  @enderror
</div>