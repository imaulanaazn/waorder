<?php

namespace App\Livewire\Pages\Store;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.blank-layout')]
class CreateStore extends Component
{

    public $form_step = 1;

    public $fields_1 = [
        'name' => '',
        'slug' => '',
        'description' => '',
    ];

    public $fields_2 = [
        'phone' => '',
        'email' => '',
        'address' => '',
        'city' => '',
        'province' => '',
        'postal_code' => '',
    ];

    public $form = [];
    public $errors = [];

    public function mount()
    {
        $this->form = [...$this->fields_1, ...$this->fields_2];
        $this->errors = [...$this->fields_1, ...$this->fields_2];
    }

    public function render()
    {
        return view('livewire.pages.store.create-store');
    }

    public function nextStep()
    {

        $fields = $this->form_step == 1 ? $this->fields_1 : $this->fields_2;

        foreach ($fields as $key => $value) {
            if ($this->form[$key] !== '') {
                $this->errors[$key] = '';
            } else {
                $this->errors[$key] = ucwords(strtolower(str_replace('_', ' ', $key))) . ' Wajib diisi';
            }
        }

        $stepErrors = array_intersect_key($this->errors, $fields);

        if (empty(array_filter($stepErrors))) {
            $this->form_step++;
        }
    }

    public function save()
    {
        foreach ($this->form as $key => $value) {
            if ($this->form[$key] !== '') {
                $this->errors[$key] = '';
            } else {
                $this->errors[$key] = ucwords(strtolower(str_replace('_', ' ', $key))) . ' Wajib diisi';
            }
        }

        $userId = Auth::user()->id;

        $new_store = [...$this->form, 'user_id' => $userId];

        if (empty(array_filter($this->errors))) {
            $store = Store::create($new_store);
            $this->dispatch('alert', type: 'success', message: 'Store berhasil dibuat');
            $this->redirect(route('store-index'));
        }
    }

    public function prevStep()
    {
        $this->form_step--;
    }
}
