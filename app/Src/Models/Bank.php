<?php

namespace App\Src\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];


}
