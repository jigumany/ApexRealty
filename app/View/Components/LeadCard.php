<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LeadCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lead;
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lead-card');
    }
}
