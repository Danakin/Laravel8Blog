<?php

namespace App\Http\Livewire\Inputs;

use Livewire\Component;

class TextArea extends Component
{
    public $name;
    public $text;
    public $label;

    public function __construct($name = "", $text = "", $label = "")
    {
        $this->name = $name;
        $this->text = $text;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.inputs.text-area');
    }
}
