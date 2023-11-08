<x-navbar/>
<div class="container mx-auto">
    <div class="flex justify-center items-center">
    <div class="w-72 md:w-80 bg-white border mt-12 mx-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col pb-7 px-4">
          <img class="w-20 mt-4 mx-auto object-cover h-20 mb-3 rounded-full shadow-lg" src="{{$post['user']['profile'] ? asset('storage/'.$post['user']['profile']) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=626&ext=jpg&ga=GA1.1.988097705.1691639176&semt=ais'}}" alt="Bonnie image"/>
          <h5 class="mb-2 text-xl font-medium text-gray-600 dark:text-white">title - {{$post['title']}}</h5>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">description - {{$post['description']}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">status - {{$post['status'] == 1 ? 'Active' : 'Inactive'}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">posted user - {{$post['user']['name']}}</span>
          <span class="text-md font-medium text-gray-600 dark:text-white">posted date - {{$post['created_at']->format('Y-m-d')}}</span>
      </div>
      @if (auth()->user()->id == $post['created_user_id'] || auth()->user()->type == 0)
      <div class="flex justify-center mb-3">
        <a href="/post/edit/{{$post['id']}}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a> 
          <button onclick="confirmDelete({{$post['id']}})" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
      </div>
      @endif
    </div>
    </div>
</div>

<script>
  function confirmDelete(id) {
      Swal.fire({
          title: "Are you sure want to delete?",
          text: "this action cannot be undone!",
          width: 300,
          fontSize: '14px',
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes",
      }).then((result) => {
          if (result.isConfirmed) {
            fetch(`/post-delete/${id}`, {
                      method: 'DELETE',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-Token': '{{ csrf_token() }}'
                      },
                  }).then(() => window.location.href = '/posts')
          }
      });
  }
  </script>