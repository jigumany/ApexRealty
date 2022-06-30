<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadEmail extends Model
{
    use HasFactory;

    protected $table = "lead_email";
    protected $fillable = ["email", "lead_id"];
}
