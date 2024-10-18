<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $class, $prefix, $name, $caption, $value, $rows, $required,$alert;
    public function __construct(
        $class = null,
        $prefix = null,
        $name = null,
        $caption = null,
        $value = '',
        $rows = 3,
        $required = '',
        $alert = '1',
    )
    {
        $this->class = $class;
        $this->prefix = $prefix;
        $this->name = $name;
        $this->caption = $caption;
        $this->value = $value;
        $this->rows = $rows;
        $this->required = $required;
        $this->alert = $alert;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
