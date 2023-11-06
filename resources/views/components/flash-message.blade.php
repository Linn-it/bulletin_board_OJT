@if (session()->has('message'))
    <div x-data="{show : true}" x-init="setTimeout(() => show = false,3000)" x-show="show">
      <p class="bg-green-300 font-medium py-3 text-center">{{session('message')}}</p>
    </div>
@endif