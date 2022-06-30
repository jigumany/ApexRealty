<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDocument extends Model
{
    use HasFactory;

    protected $table = "lead_document";
    protected $fillable = ["lead_id", "document_id"];
}
