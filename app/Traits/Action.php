<?php

namespace App\Traits;

use App\Models\Action as ModelsAction;

trait Action
{
    protected function logAction($message)
    {
        $action = new ModelsAction();
        $action->username = auth()->user()->name;
        $action->action = $message;
        $action->save();
        return $action;
    }
}