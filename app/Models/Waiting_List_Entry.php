<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiting_List_Entry extends Model
{
    use HasFactory;

    protected $table = 'waiting_list_entries';
    public $primaryKey = 'list';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
