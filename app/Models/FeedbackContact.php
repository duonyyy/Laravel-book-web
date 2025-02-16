<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackContact extends Model
{
    use HasFactory;
    protected $table = 'feedback_contact';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'feedback'
    ];
}
