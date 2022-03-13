<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller {

    //
    function __construct(Action $Action) {
        $this->action = $Action;
        $this->middleware('permission:show_log', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $action = new Action();
        $action->saveAction([
                                'ar' => ' قام ' . Auth::user()->getOriginal('name')['ar'] . ' بفتح صفحة عمليات النظام',
                                'en' => Auth::user()->getOriginal('name')['en'] . ' opens log page'
                            ]);

        $actions = $this->action->getAll();
        return view('admin.log.index', ['actions' => $actions]);
    }

}
