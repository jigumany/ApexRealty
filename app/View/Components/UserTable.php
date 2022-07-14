<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTable extends Component
{
    public $users;
    public $currentUser;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users, $currentUser)
    {
        $this->users = $users;
        $this->currentUser = $currentUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-table');
    }
}
