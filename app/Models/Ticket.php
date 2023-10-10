<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'detail',
        'type',
        'category',
        'priority',
        'bug_url',
        'bug_source',
        'estimate_timeline',
        'suggestion_type',
        'department',
        'status',
        'issue_image',
        'user_id',
    ];

    // Define the relationship with the User model (a ticket belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
