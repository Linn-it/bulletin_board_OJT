<x-navbar/>

<form class="flex justify-center items-center my-10" action="/user/create" method="post">
  @csrf
  <div style="background : #f5f2f2" class="w-72 sm:w-2/5 py-6 px-9 rounded-lg">
  <h2 class="text-center text-2xl text-gray-700 mb-3">Create Confirm User</h2>
    <div class="flex gap-3 w-full mb-4">
      <div class="w-full">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="name" value="{{$datas['name']}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('name')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="w-full">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
        <input type="text" name="email" value="{{$datas['email']}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('email')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="flex gap-3 w-full mb-4">
      <div class="w-full">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" value="{{$datas['password']}}" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('password')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="w-full">
        <label for="password2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
        <input type="password" name="password_confirmation" value="{{$datas['password_confirmation']}}" id="password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('password_confirmation')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="flex gap-3 w-full mb-4">
      <div class="w-full">
        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
        <input type="text" name="type" value="{{$datas['type'] == '1' ? "User" : 'Admin'}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('type')
          <p style="color: red">{{$message}}</p>
        @enderror
      </div>
      <div class="w-full">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
        <input type="number" name="phone" value="{{$datas['phone']}}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
        @error('phone')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="mb-6">
      <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Of Birth</label>
      <input type="date" name="dob" value="{{$datas['dob']}}" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
      @error('dob')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
      <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" readonly>{{$datas['address']}}</textarea>
      @error('address')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class=" mb-6">
      <label for="profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
      <input type="text" name="profile" value="{{$datas['profile']}}" readonly hidden>
      <img src="{{asset('storage/'.$datas['profile'])}}" class="rounded" alt="">
      @error('profile')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="flex justify-center">
      <button class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Confirm</button>
      <button onclick="window.history.back()" type="reset" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
    </div>
  </form>
  </div>
</div>