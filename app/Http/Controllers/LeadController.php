<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;
use App\Models\LeadEmail;
use App\Models\Task;
use App\Models\LeadStatus;

class LeadController extends Controller
{
    public function index() {
        $title = 'Leads';
        $current_user = auth()->user();
        $leads = Lead::latest()->filter(request(['search']))->get();
        return view('modules.leads.index', compact('title', 'current_user', 'leads'));
    }

    public function show($id) {
        $title = 'Lead'; 
        $lead = Lead::find($id);
        $status = LeadStatus::find($lead->status);
        $current_user = auth()->user();
        $tasks = Task::where('lead_id', '=', $id)->get();
        return view('modules.leads.view', compact('title', 'lead', 'status', 'current_user', 'tasks'));
    }   

    public function create(Lead $lead) {
        $title = 'Create Lead';
        $statuses = LeadStatus::all();
        $referrals = ['Website', 'Word of Mouth', 'Facebook', 'LinkedIn', 'Social Media', 'Other'];
        $projecttypes = ['Lease Renewal', 'Other'];
        return view('modules.leads.create', compact('title', 'statuses', 'referrals', 'projecttypes'));
    }
    
    public function store(Request $request, User $user, $id = null) {
        $validated = $request->validate([
            "first_name" => "required",
            "middle_name" => "nullable",
            "last_name" => "required",
            "status" => "required",
            "referral_source" => "nullable",
            "position_title" => "nullable",
            "industry" => "nullable",
            "project_type" => "required",
            "company" => "required",
            "project_description" => "required",
            "description" => "nullable",
            "budget" => "required",
            "website" => 'nullable',
            "linkedin" => 'nullable',
            "address_street" => "required",
            "address_city" => "required",
            "address_state" => "required",
            "address_country" => "required",
            "address_zipcode" => "required",
            "emails.*.email" => 'required',
            "phones.*.phone" => 'required',
        ]);
        if($id) {
            $lead = Lead::find($id);
            if($lead) {
                $lead->update($validated);
                $emails = [];
                foreach($request['emails'] as $email) {
                    $emails[] = $email;
                }
                $lead->modified_by_id = auth()->user()->id;
                $msg = "Lead has been updated!";
            }
        } else {
            $lead = Lead::create($validated);
            $lead->emails()->createMany($request['emails']);
            $lead->phones()->createMany($request['phones']);
            $lead->created_by_id = auth()->user()->id;
            $msg = "Lead has been created!";
        }

        return redirect('/admin/leads/')->with('success', $msg);
    }

    public function edit(Lead $lead) {
        $title = 'Update Lead';
        $statuses = LeadStatus::all();
        $referrals = ['Website', 'Word of Mouth', 'Facebook', 'LinkedIn', 'Social Media', 'Other'];
        $projecttypes = ['Lease Renewal', 'Other'];

        return view('modules.leads.edit', compact('title', 'lead', 'statuses', 'referrals', 'projecttypes'));
    }
    public function assign(User $user) {
        $users = $user::where('is_active', '=', 1)->where('is_super_admin', '=', 0)->where('is_admin', '=', 0)->get(); // Grab all users on the system that aren't admins or super admins
    }
    public function delete(Lead $lead) {
        $lead->delete();
        return redirect('/admin/leads/')->with('success', 'Lead has been Deleted!');
    }
}
