<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\Document;
use App\Models\Task;
use App\Models\TaskStatus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $fillable = [
        'name', 'email', 'password', 'position_title', 'phone', 'image', 'is_super_admin', 'is_admin', 'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * get all contacts assigned to user
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leads()
    {
        return $this->hasMany(Lead::class, 'assigned_user_id');
    }
    /**
     * get all leads assigned to user
     */
    public function new_leads()
    {
        return $this->hasMany(Lead::class, 'assigned_user_id')->where('status', LeadStatus::where('name', config('seed_data.lead_status')[0])->first()->id);
    }
    /**
     * get all opportunities assigned to user
     */
    public function opportunities()
    {
        return $this->hasMany(Contact::class, 'assigned_user_id')->where('status', LeadStatus::where('name', config('seed_data.contact_status')[1])->first()->id);
    }
    /**
     * get all customers assigned to user
     */
    public function customers()
    {
        return $this->hasMany(Lead::class, 'assigned_user_id')->where('status', LeadStatus::where('name', config('seed_data.contact_status')[2])->first()->id);
    }
    /**
     * get all closed/archives customers assigned to user
     */
    public function archives()
    {
        return $this->hasMany(Lead::class, 'assigned_user_id')->where('status', LeadStatus::where('name', config('seed_data.contact_status')[3])->first()->id);
    }
    /**
     * get all documents assigned to user
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'assigned_user_id');
    }
    /**
     * get all tasks assigned to user
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_user_id');
    }
    /**
     * get all completed tasks assigned to user
     */
    public function completedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_user_id')->where('status', TaskStatus::where('name', config('seed_data.task_statuses')[2])->first()->id);
    }
    /**
     * get all pending tasks assigned to user
     */
    public function pendingTasks()
    {
        return $this->hasMany(Task::class, 'assigned_user_id')->where('status', TaskStatus::whereIn('name', [config('seed_data.task_statuses')[0], config('seed_data.task_statuses')[1]])->first()->id);
    }
}
