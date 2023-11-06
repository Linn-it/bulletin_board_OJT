<x-navbar/>

<form class="flex justify-center items-center my-10" method="post" action="/login">
  @csrf
  <div style="background : #f5f2f2" class="w-72 sm:w-96 py-6 px-9 rounded-lg">
    <h2 class="text-center text-2xl text-gray-700 mb-3">Login</h2>
    <div class="mb-6">
      <label for="email" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address <span class="text-red-700">*</span></label>
      <input type="email" name="email" @if (isset($_COOKIE['email']))
      value="{{$_COOKIE['email']}}"
  @endif id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('email')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    
    <div class="mb-6 relative" x-data="{show : true}">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password <span class="text-red-700">*</span></label>
        <input :type="show ? 'password' : 'text'" name="password" @if (isset($_COOKIE['password']))
      value="{{$_COOKIE['password']}}"
  @endif id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      <div class="absolute inset-y-0 cursor-pointer right-0 pr-3 flex items-center text-sm leading-5 font-medium">
        <p class=" mt-5" @click="show=! show" x-text=" show ? 'Show' : 'Hide' "></p>
      </div>
      @error('password')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" name="remember" @if (isset($_COOKIE['email']))
          checked
      @endif class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
          <a href="/forget-password" class="text-sm text-blue-700">Forget Password?</a>
      </div>
    <button type="submit" class="text-white bg-blue-500 mb-4 hover:bg-blue-600 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Login</button>
    <div class="flex items-center">
      <a href="/register" class="text-sm text-blue-700 me-1">Create Account</a>
      <svg class="w-4 h-4 text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
      </svg>
    </div>
  </div>
</form>