<x-navbar/>

<form class="flex items-center justify-center my-10" method="post" action="/forget-password">
  @csrf
  <div style="background : #f5f2f2" class="w-72 sm:w-96 py-6 px-9 rounded-lg">
    <h2 class="text-center text-2xl text-gray-700 mb-3">Forget Password</h2>
    <div class="mb-6">
      <label for="email" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      @error('email')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
    @enderror
    </div>
    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Forget Password</button>
  </div>
</form>
