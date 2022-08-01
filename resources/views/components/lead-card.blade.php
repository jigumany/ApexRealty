@php
    $classes = array();
    if($lead->getStatus()->first()->name === "New") {
        array_push($classes, 'new');
    } else if($lead->getStatus()->first()->name === "Opportunity") {
        array_push($classes, 'ap-opportunity');
    } else if($lead->getStatus()->first()->name === "Customer") {
        array_push($classes, 'ap-customer');
    } else if($lead->getStatus()->first()->name === "Close") {
        array_push($classes, 'ap-close');
    }
@endphp 
<div class="col-span-2 lead-card bg-white rounded-sm shadow-sm border-collapse position-relative w-100 p-4">
    <div class="content">
        <div class="title-and-badge flex justify-between align-items-center mb-3">
            <h3 class="text-xl">{{ $lead->first_name }}</h3>
            <div class="badges">
                <a class="ap-badge text-white mr-1 {{ implode(' ', $classes) }}">
                    {{ $lead->getStatus()->first()->name }}
                </a>
                <span class="ap-badge ap-date"> {{ $lead->created_at->diffForHumans() }}</span>
            </div>
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
        {{-- <a href="{{ route('leads.assign', $lead->id) }}" class="h-[45px] w-[150px] flex justify-center border border-slate-900 align-items-center rounded-sm hover:text-green-900 transition duration-300 ml-3">Assign Lead</a> --}}
    </div>
</div>