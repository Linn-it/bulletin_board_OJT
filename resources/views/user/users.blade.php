<x-navbar/>

<div class="container mx-auto">
  <div class="flex justify-between flex-wrap items-center">
    <form class="flex items-center flex-wrap" action="/users">
            <input type="text" name="name" value="{{request('name')}}" class="bg-gray-50 border mt-5 mx-3 border-gray-300 text-gray-900 text-sm rounded-lg block px-5 py-2" placeholder="Name">
            <input type="text" name="email" value="{{request('email')}}" class="bg-gray-50 border mt-5 mx-3 border-gray-300 text-gray-900 text-sm rounded-lg block px-5 py-2" placeholder="Email">
            <br>
            <input type="date" name="fromDate" value="{{request('fromDate')}}" class="bg-gray-50 border mt-5 mx-3 border-gray-300 text-gray-900 text-sm rounded-lg block px-5 py-2">
            <input type="date" name="toDate" value="{{request('toDate')}}" class="bg-gray-50 border mt-5 mx-3 border-gray-300 text-gray-900 text-sm rounded-lg block px-5 py-2">
        <button type="submit" class="text-white mt-7 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Search</button>
          @if (request()->has('name'))
            <a href="/users" class="text-white mt-7 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancel</a>
          @endif
    </form>
  
    <div>
        <a href="/user/create">
            <button type="submit" class="text-white mt-5 xl:mt-7 ml-3 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create</button>
        </a>
    </div>
  </div>
  
  <div class="flex justify-center flex-wrap">
    @if(count($users))
    @foreach ($users as $user)
  <div class="w-full max-w-xs bg-white border mt-12 mx-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center px-4">
        <img class="w-20 mt-4 h-20 mb-3 rounded-full shadow-lg object-cover" src="{{$user['profile'] ? asset('storage/'.$user['profile']) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=626&ext=jpg&ga=GA1.1.988097705.1691639176&semt=ais'}}" alt="Bonnie image"/>
        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-4 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$user['type'] == 0 ? 'Admin' : 'Member'}}</span>
        <div class="bg-green-100 w-full text-center rounded-xl py-2 mb-3 mt-3">
          <h5 class="text-base mb-2 text-gray-700 dark:text-gray-400">Name : {{$user['name']}}</h5>
          <p class="text-base mb-2 text-gray-700 dark:text-gray-400">Email : {{$user['email']}}</p>
        </div>
        <div class="bg-green-100 w-full text-center rounded-xl py-2">
          <p class="text-base mb-2 text-gray-700 dark:text-gray-400">Created Date : {{$user['created_at']->format('Y-m-d')}}</p>
          <p class="text-base mb-2 text-gray-700 dark:text-gray-400">Updated Date : {{$user['updated_at']->format('Y-m-d')}}</p>
        </div>
    </div>
    <div class="flex justify-center mt-5 mb-2">
      <a href="/user-detail/{{$user['id']}}" type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</a>
    </div>
  </div>
  @endforeach
  @else
    <img class="mt-10 rounded-md" width="400" height="400" src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?w=740&t=st=1699244170~exp=1699244770~hmac=fdb526499b2d9f1133e6af1acb8c423615965f5271be3893d93fc537c96dc6a9" alt="">    
  @endif
  </div>
</div>

<div class="mt-8 px-4">
  {{$users->links()}}
</div>