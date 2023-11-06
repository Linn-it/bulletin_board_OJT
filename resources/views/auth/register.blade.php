<x-navbar/>

  <form class="flex justify-center items-center my-10" method="post" action="/register">
    @csrf
    <div style="background: #f5f2f2" class="w-72 sm:w-96 py-6 px-9 rounded-lg">
    <h2 class="text-center text-2xl text-gray-700 mb-3">Register</h2>
      <div class="mb-6">
        <label for="name" class="mb-2 text-sm font-medium text-gray-900">Name <span class="text-red-700">*</span></label>
        <input type="name" name="name" value="{{old('name')}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
        @error('name')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address <span class="text-red-700">*</span></label>
        <input type="email" name="email" value="{{old('email')}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        @error('email')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
      </div>

      <div class="mb-6 relative" x-data="{show : true}">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password <span class="text-red-700">*</span></label>
        <input :type="show ? 'password' : 'text'" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        <div class="absolute inset-y-0 cursor-pointer right-0 pr-3 flex items-center text-sm leading-5 font-medium">
          <p class=" mt-5" @click="show=! show" x-text=" show ? 'Show' : 'Hide' "></p>
        </div>
        @error('password')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
      </div>
      
      <div class="mb-6 relative" x-data="{show : true}">
        <label for="password2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password <span class="text-red-700">*</span></label>
        <input :type="show ? 'password' : 'text'" name="password_confirmation" id="password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        <div class="absolute inset-y-0 cursor-pointer right-0 pr-3 flex items-center text-sm leading-5 font-medium">
          <p class=" mt-5" @click="show=! show" x-text=" show ? 'Show' : 'Hide' "></p>
        </div>
        @error('password_confirmation')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
      </div>
      
      <div class="flex justify-center">
      <button type="submit" class="text-white me-4 bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
      <a href="/login">
      <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
      </a>
      </div>
    </div>
  </form>