<x-navbar/>

<form class="flex justify-center items-center my-10" action="/import_post" method="post" enctype="multipart/form-data">
  @csrf
  <div style="background : #f5f2f2" class="w-72 sm:w-96 py-6 px-9 rounded-lg">
  <h2 class="text-center text-2xl text-gray-700 mb-3">Upload CSV file</h2>
    <div class="mb-6">
      <label for="fileUpload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CSV file</label>
      <input type="file" name="fileUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
      @error('fileUpload')
        <p class="text-red-700 text-sm mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="flex justify-center mt-6">
      <button class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Upload</button>
      <button type="reset" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Clear</button>
    </div>
  </form>
  </div>
</div>