<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VTable extends Component
{
    public $th;
    public $rows;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($th, $rows)
    {
        $this->th = explode(',', $th);
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.v-table');
    }
}