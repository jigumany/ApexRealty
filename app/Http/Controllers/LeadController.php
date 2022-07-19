<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeadController extends Controller
{
    public function index() {
        $title = 'Leads';
        $current_user = auth()->user();
        return view('modules.leads.index', compact('title', 'current_user'));
    }
    public function create(User $user) {
        $title = 'Create Lead';
        return view('modules.leads.create', compact('title'));
    }
}
