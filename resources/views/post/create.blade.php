<x-navbar/>

  <form class="flex justify-center items-center my-10" action="/create-confirm" method="post">
    @csrf
    <div style="background : #f5f2f2" class=" w-72 sm:w-96 py-6 px-9 rounded-lg">
    <h2 class="text-center text-2xl text-gray-700 mb-3">Create Post</h2>
      <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" name="title" id="title" value="{{old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        @error('title')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea id="desc" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{old('description')}}</textarea>
        @error('description')
          <p class="text-red-700 text-sm mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="flex justify-center mt-6">
        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Create</button>
        <button type="reset" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Clear</button>
      </div>
    </form>
    </div>
</div>