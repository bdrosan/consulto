<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AutoTable extends Component
{
    public $th;
    public $td;
    public $data;
    public $link;
    public $action;
    public $checkbox;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($th, $data, $td = false, $link = false, $action = false, $checkbox = false)
    {
        $this->th = explode(',', $th);

        if ($td)
            $this->td = explode(',', $td);

        $this->data = $data;
        $this->link = $link;
        $this->action = $action;

        if ($checkbox)
            $this->checkbox = $checkbox;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auto-table', $this->data);
    }
}