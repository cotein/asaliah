<?php

namespace App\Src\Models;

use Sofa\Eloquence\Eloquence;
use App\Src\Models\MeasureUnity;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model implements Auditable
{
    use LogsActivity, Eloquence;

    use \OwenIt\Auditing\Auditable;

    protected $searchableColumns = ['name', 'code'];

    public function measure_unity()
    {
        return $this->hasOne(MeasureUnity::class, 'id', 'measure_unit_id');
    }
}
