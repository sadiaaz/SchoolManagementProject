<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExportToolbar extends Component
{
    public $module;
    public $createRoute;
    public $title;

    public function __construct($module, $createRoute = null, $title = '')
    {
        $this->module = $module;
        $this->createRoute = $createRoute;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.export-toolbar');
    }
}