<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $th;
    public $td;
    public $data;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($th, $td = false, $data, $link = false)
    {
        $this->th = explode(',', $th);
        if ($td)
            $this->td = explode(',', $td);
        $this->data = $data;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table', $this->data);
    }
}
