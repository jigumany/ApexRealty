@if(session()->has('success'))
<div 
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 2000)"
    x-show="show"
    class="w-[500px] p-4 py-2 text-m text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 shadow-sm position-fixed bottom-5 right-5" role="alert">
    <span class="font-medium">{!! session('success') !!}</span>
</div>
@endif
