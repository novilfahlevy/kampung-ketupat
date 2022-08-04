<?php

namespace App\Traits;

use App\Models\Action as ModelsAction;

trait Action
{
    protected function logAction($action)
    {
        $action = new ModelsAction();
        $action->username = auth()->user()->name;
        $action->action = $action;
        return $action;
    }
}