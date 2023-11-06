<x-navbar/>

<form class="flex justify-center items-center my-10" action="/create/confirm" method="post" enctype="multipart/form-data">
  @csrf
  <div style="background : #f5f2f2" class="w-72 sm:w-96 py-6 px-9 rounded-lg">
  <h2 class="text-center text-2xl text-gray-700 mb-3">Create User</h2>
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="name" value="{{old('name')}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('name')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
      <input type="text" name="email" value="{{old('email')}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('email')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
      <input type="password" name="password" value="{{old('password')}}" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('password')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="password2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
      <input type="password" name="password_confirmation" value="{{old('password')}}" id="password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('password_confirmation')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
      <select name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="0">Admin</option>
        <option value="1" selected>User</option>
      </select>
      @error('type')
        <p style="color: red">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
      <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('phone')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Of Birth</label>
      <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
      @error('dob')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
      <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{old('address')}}</textarea>
      @error('address')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class=" mb-6">
      <label for="profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">profile</label>
      <input type="file" name="profile" value="{{old('profile')}}"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
      @error('profile')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="flex justify-center">
      <button class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Create</button>
      <button type="reset" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Clear</button>
    </div>
  </form>
  </div>
</div>