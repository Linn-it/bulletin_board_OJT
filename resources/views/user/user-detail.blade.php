<x-navbar/>

<div class="container mx-auto">
    
    <div class="flex justify-center items-center">
    <div class="w-72 sm:w-96 bg-white border mt-12 mx-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col pb-7 px-4">
        <img class="w-20 mt-4 h-20 mb-3 mx-auto rounded-full shadow-lg object-cover" src="{{$data['profile'] ? asset('storage/'.$data['profile']) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=626&ext=jpg&ga=GA1.1.988097705.1691639176&semt=ais'}}" alt="Bonnie image"/>
          <h5 class="mb-2 text-xl font-medium text-gray-600 dark:text-white">Name - {{$data['name']}}</h5>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">Email - {{$data['email']}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">Type - {{$data['type'] == 0 ? 'Admin' : 'Member'}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">Phone - {{$data['phone']}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">Date of Birth - {{$data['dob']}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">Address - {{$data['address']}}</span>
          <span class=" mb-2 text-md font-medium text-gray-600 dark:text-white">created date - {{$data['created_at']->format('Y-m-d')}}</span>
          <span class=" mb-2 text-md font-medium text-gray-600 dark:text-white">created user - {{$data['createdUser']['name']}}</span>
          <span class="mb-2 text-md font-medium text-gray-600 dark:text-white">updated date - {{$data['updated_at']->format('Y-m-d')}}</span>
          <span class="text-md font-medium text-gray-600 dark:text-white">updated user - {{$data['createdUser']['name']}}</span>

      </div>
      <div class="flex justify-center mb-3">
        <a href="/user/edit/{{$data['id']}}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a> 
        {{-- <form action="/post-delete/{{$data['id']}}" method="post">
            @csrf
            @method('DELETE') --}}
          <button type="button" onclick="confirmDelete({{$data['id']}})" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
        {{-- </form>   --}}
      </div>
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
          fetch(`/user-delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                }).then(() => window.location.href = '/users')
        }
    });
}
</script>