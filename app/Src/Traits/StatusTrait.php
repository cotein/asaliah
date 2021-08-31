<?php

namespace App\Src\Traits;

trait StatusTrait
{
    public function setStatus($status)
    {
        if ($status <= $this->status_id) {
            return false;
        }

        $this->status_id = $status;

        $this->save();
        
        $this->refresh();

        return $this;
    }

    public function getStatus()
    {
        return $this->status->id;
    }

    public function statusName()
    {
        return $this->status->name;
    }
}
