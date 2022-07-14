@if($currentUser->is_super_admin === 1 || $currentUser->is_admin === 1)
    <div class="grid-card__admin-actions position-absolute top-2 right-5">
        <button type="button"
            class="inline-flex justify-center w-full text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            Options
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <div class="actions-menu origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <a href="#" record="user" person="{{ $user->name }}" record-id="{{ $user->id }}" class="delete text-red-500 block px-4 py-2 text-sm transition duration-300 hover:text-red-700" role="menuitem" tabindex="-1" id="menu-item-0">Delete</a>
                <a href="#suspend" class="suspend text-yellow-500 block px-4 py-2 text-sm transition duration-300 hover:text-yellow-700" role="menuitem" tabindex="-1" id="menu-item-1">Suspend Account</a>
            </div>
        </div>
    </div>
@endif