<?php

namespace App\Http\Livewire\Inputs;

use Livewire\Component;

class Text extends Component
{
    public $name;
    public $value;
    public $label;

    public function __construct($name = "", $value = "", $label = "")
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.inputs.text');
    }
}
