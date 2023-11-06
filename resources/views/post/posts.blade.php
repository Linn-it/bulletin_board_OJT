<x-navbar/>

<div class="container mx-auto">
    <div class="flex justify-between mt-5 items-center flex-wrap mx-3">
        <form class="flex items-center" action="/posts">
            <div class="flex">
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                </div>
                <input type="text" name="search" value="{{request('search')}}" class="bg-gray-50 border mr-2 border-gray-300 text-gray-900 text-sm rounded-lg block px-8  py-2">
            </div>
            <button type="submit" class="text-white mt-1.5 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Search</button>
            @if (request()->has('search'))
                <a href="/posts" class="text-white mt-1.5 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancel</a>
            @endif
        </form>

        <div>
            <a href="/post/create">
                <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create</button>
            </a>
            <a href="/post_import">
                <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Upload</button>
            </a>
            <a href="{{route('post_export',['search' => request('search')])}}">
                <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Download</button>
            </a>
        </div>
    </div>
    
    <div class="flex justify-center flex-wrap mt-10">
        @if (count($posts))
        @foreach ($posts as $post)
        <div class="w-72 md:w-80 bg-white border mt-12 mx-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-5">
                <img class="w-20 mt-4 object-cover h-20 mb-3 rounded-full shadow-lg" src="{{$post['user']['profile'] ? asset('storage/'.$post['user']['profile']) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=626&ext=jpg&ga=GA1.1.988097705.1691639176&semt=ais'}}" alt="Bonnie image"/>
                <span class="mb-1 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-4 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$post['status'] == 1 ? 'Active' : 'Inactive'}}</span>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$post['title']}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$post['description']}}</span>
            </div>
            <div class="flex justify-center">
              <a href="/post/detail/{{$post['id']}}" type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</a>
            </div>
          </div>
        @endforeach
        @else
            <img class="mt-7 rounded-md" width="400" height="400" src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?w=740&t=st=1699244170~exp=1699244770~hmac=fdb526499b2d9f1133e6af1acb8c423615965f5271be3893d93fc537c96dc6a9" alt="">    
        @endif
    </div>
</div>

<div class="mt-8 px-4">
    {{$posts->links()}}
  </div>
