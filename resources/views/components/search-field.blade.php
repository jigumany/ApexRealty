<div class="search-box mt-2 lg:mt-0">
    <form action="" method="GET">
        <input value="{{ request('search') }}" type="text" name="search" class="p-2 mr-1 rounded-md focus:outline-none w-[300px] border focus:border-indigo-800" placeholder="{{ $attributes['placeholder'] }}"/>
        <button class="p-2 bg-slate-900 text-white rounded-md w-[100px]" type="submit">Search</button>
    </form>
</div>