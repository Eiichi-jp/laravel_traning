<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Folder extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');//左記省略形：('App\Task', 'folder_id', 'id')
    }
}
