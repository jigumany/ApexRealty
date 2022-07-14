<section class="antialiased bg-gray-100 text-gray-600 min-h-screen">
    <div class="h-full">
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Position Title</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Phone</div>
                                </th>
                                @if($currentUser->is_super_admin === 1 || $currentUser->is_admin === 1)
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Actions</div>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $user->id }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{ $user->image ? $user->image : "
                                                https://avatars.dicebear.com/api/adventurer/{$user->name}.svg" }}" width="40" height="40" alt="Alex Shatov"></div>
                                            <div class="font-medium text-gray-800">{{ $user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $user->email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500">{{ $user->position_title }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">🇺{{ $user->phone }}</div>
                                    </td>
                                    @if($currentUser->is_super_admin === 1 || $currentUser->is_admin === 1)
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-center">
                                                <a href="#" record="user" person="{{ $user->name }}" record-id="{{ $user->id }}" class="delete text-red-500 block px-4 py-2 text-sm transition duration-300 hover:text-red-700" role="menuitem" tabindex="-1" id="menu-item-0">Delete</a>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>