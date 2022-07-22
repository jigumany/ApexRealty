<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $table = "lead";

    protected $fillable = ["first_name", "middle_name", "last_name", "status", "referral_source", "position_title", "industry",
        "project_type", "company", "project_description", "description", "budget", "website", "linkedin",
        "address_street", "address_city", "address_state", "address_country", "address_zipcode", "created_by_id",
        "modified_by_id", "assigned_user_id"];

    /**
     * get created by user object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * get assigned to user object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /**
     * get status object of this contact i.e lead, opportunity, etc.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getStatus()
    {
        return $this->belongsTo(LeadStatus::class, 'status');
    }

    /**
     * get all documents for this contact (this relation is a many to many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, 'lead_document', 'lead_id', 'document_id');
    }

    /**
     * get all emails for this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(LeadEmail::class, 'lead_id');
    }

    /**
     * get all phones for this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(LeadPhone::class, 'lead_id');
    }

    /**
     * get all tasks related to this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'lead_id');
    }

    public function getName()
    {
        return $this->first_name .  (!empty($this->middle_name)?" " . $this->middle_name . " ":"") . (!empty($this->last_name)?" " . $this->last_name:"");
    }
    public function scopeFilter($query, array $filters) 
    {
        if(isset($filters['search'])) {
            $query->where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%')
                ->orWhere('project_type', 'like', '%' . request('search') . '%')
                ->orWhere('address_city', 'like', '%' . request('search') . '%');
        }
    }
}
