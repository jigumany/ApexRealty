<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserActions extends Component
{
    public $currentUser;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentUser, $user)
    {
        $this->currentUser = $currentUser;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-actions');
    }
}
