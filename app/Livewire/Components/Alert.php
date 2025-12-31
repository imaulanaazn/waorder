<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public string $message = '';
    public string $type = 'info';
    public bool $visible = false;

    protected $listeners = ['alert' => 'show'];

    public function show($message, $type = 'info')
    {
        $this->message = $message;
        $this->type   = $type;
        $this->visible = true;

        // We let Alpine + JS handle the auto-dismiss
    }

    public function hide()
    {
        $this->visible = false;
        $this->reset(['message', 'type']);
    }

    public function render()
    {
        return view('livewire.components.alert');
    }
}
