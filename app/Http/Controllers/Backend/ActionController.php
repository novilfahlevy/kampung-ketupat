<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $actions = Action::query()->orderByDesc('created_at');

        if ($request->query->has('keyword')) {
            $actions->keyword($request->query->get('keyword'));
        }

        $actions = $actions->paginate(10);

        return view('backend.pages.actions.index', compact('actions'));
    }
}
