<div
    class="grid-card bg-white flex flex-col rounded-sm shadow-sm border-collapse position-relative">
    <div class="grid-card__user-details p-2">
        <div class="user-details flex mb-2">
            <img class="avatar shadow-sm mr-2" src="{{ $user->image ? $user->image : "
                https://avatars.dicebear.com/api/adventurer/{$user->name}.svg" }}"
            alt="avatar-image">
            <div class="user-details__inner">
                <p>{{ $user->roles()->orderBy('name')->first()->name }}</p>
                <h3>{{ $user->name }}</h3>
            </div>
        </div>
        <p><span class="font-bold">Position:</span> {{ $user->position_title }}</p>
        <p><span class="font-bold">Phone:</span> {{ $user->phone }}</p>
    </div>
    <div class="grid-card__user-actions flex flex-row w-100 ">
        <a class="flex-1 p-3 text-center justify-center align-items-center border-2 border-gray-100 border-r-0"
            href="{{ 'show-profile' }}">View Profile</a>
        <a class="flex-1 p-3 text-center justify-center align-items-center border-2 border-gray-100"
            href="{{ route('user.edit', $user->id) }}">Edit Profile</a>
    </div>
    <x-user-actions :current-user="$currentUser" :user="$user"/>
</div>