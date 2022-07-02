<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['page_id', 'status', 'order', 'title', 'href', 'op_bg_color', 'op_text_color', 'op_border_type'];
}
