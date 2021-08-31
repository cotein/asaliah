<?php
namespace App\Src\Afip\WS\Responses;

interface AfipResponseContract {

    public function hasErrors();
    public function getErrors();
    public function hasEvents();
    public function getEvents();
    public function hasObservaciones();
    public function getObservaciones();
}