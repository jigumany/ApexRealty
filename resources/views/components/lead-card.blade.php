@php
    $classes = array();
    if($lead->getStatus()->first()->name === "New") {
        array_push($classes, 'bg-green-600', 'hover:bg-green-500');
    } else if($lead->getStatus()->first()->name === "Opportunity") {
        array_push($classes, 'bg-yellow-600', 'hover:bg-yellow-500');
    } else if($lead->getStatus()->first()->name === "Customer") {
        array_push($classes, 'bg-purple-600', 'hover:bg-purple-500');
    } else if($lead->getStatus()->first()->name === "Close") {
        array_push($classes, 'bg-red-600', 'hover:bg-red-500');
    }
@endphp 
<div class="col-span-2 lead-card bg-white rounded-sm shadow-sm border-collapse position-relative w-100 p-4">
    <div class="content">
        <div class="title-and-badge flex justify-between align-items-center mb-3">
            <h3 class="text-xl">{{ $lead->first_name }}</h3>
            <a class="px-3 py-1 text-sm font-bold text-white transition-colors duration-200 cursor-pointer transform rounded-full {{ implode(' ', $classes) }}">
                {{ $lead->getStatus()->first()->name }}
            </a>
        </div>
        <div class="details">
            <p><span class="font-bold">Full name:</span> {{ $lead->first_name }} {{ $lead->middle_name }} {{ $lead->last_name }}</p>
            <p><span class="font-bold">Project type:</span> {{ $lead->project_type }}</p>
            <p><span class="font-bold">Budget:</span> R{{ $lead->budget }}</p>
        </div>
    </div>
    <div class="flex items-center mt-4">
        <a href="{{ route('leads.view', $lead->id) }}" class="h-[45px] w-[150px] flex justify-center border border-slate-900 align-items-center rounded-sm hover:text-green-900 transition duration-300">View Lead</a>
        <a href="{{ route('leads.edit', $lead->id) }}" class="h-[45px] w-[150px] flex justify-center border border-slate-900 align-items-center rounded-sm hover:text-green-900 transition duration-300 ml-3">Edit Lead</a>
        @if ($lead->assigned_user_id)
            <a class="assigned-to flex items-center" href="#">
                <img class="hidden object-cover w-10 h-10 mx-2 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">
                <span class="font-bold text-gray-700 cursor-pointer">Khatab wedaa</span>
            </a>
        @endif
    </div>
</div>