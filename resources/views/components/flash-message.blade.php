@if (session()->has('message'))
    <div x-data="{show : true}" x-init="setTimeout(() => show = false,3000)" x-show="show">
      <p class="bg-green-400 mr-10 font-medium p-3 rounded-md text-center">{{session('message')}}</p>
    </div>
@endif