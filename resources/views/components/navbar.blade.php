<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BulletinBoard</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<?php
use Illuminate\Support\Str;
?>

<nav class="bg-gray-300 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="{{str::contains(url()->current(),'register') ? 'flex justify-between items-center w-full' : ''}}">
      <div class="flex">
        <a href="" class="flex items-center me-12">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Bulletin Board</span>
        </a>
        @if (Auth::check())
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            @if (Auth::user()->type == 0)
            <li>
              <a href="/users" class="{{str::contains(url()->current(),'user') ? 'text-blue-500' : ''}} block py-2 pl-3 pr-4 font-semibold rounded md:bg-transparent md:p-0" aria-current="page">User</a>
            </li>
            @endif
            <li>
              <a href="/posts" class="{{str::contains(url()->current(),'post') ? 'text-blue-500' : ''}} block py-2 pl-3 pr-4 font-semibold rounded md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Post</a>
            </li>
          </ul>
        </div>
      </div>
      @if (str::contains(url()->current(),'register'))
      <a href="/login">
        <button class="text-white mt-1.5 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Login</button>
      </a>
      @endif
    </div>
  
  <div class="flex items-center md:order-2">
    <div class="flex justify-center items-center">
      <a href="/posts/my-post">
      <button class="text-white mt-1.5 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">My Posts</button>
      </a>
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 rounded-full object-cover" src="{{Auth::user()->profile ? asset('storage/'.Auth::user()->profile) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=626&ext=jpg&ga=GA1.1.988097705.1691639176&semt=ais'}}" alt="user photo">
      </button>
    </div>
    <!-- Dropdown menu -->
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
      <ul class="py-2" aria-labelledby="user-menu-button">
        <li>
          <a href="/user-detail/{{Auth::user()->id}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
        </li>
        <li>
          <a href="/change-password" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change Password</a>
        </li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button class="block w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">logout</button>
          </form>
        </li>
      </ul>
    </div>
    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 hover:text-gray-700 rounded-lg md:hidden" aria-controls="navbar-user" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
  </button>
</div>
<x-flash-message/>
  @endif
  </div>
</nav>

</body>
</html>