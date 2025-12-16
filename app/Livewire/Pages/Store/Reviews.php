<?php

namespace App\Livewire\Pages\Store;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Reviews extends Component
{

    public string $drawerOpen = ''; //sort, category, filter

    public $etalase = '';
    public $order = '';
    public $min_price = '';
    public $max_price = '';
    public $rate = '';
    public $kategori = '';

    public function openDrawer($drawer)
    {
        $this->drawerOpen = $drawer;
    }

    public function closeDrawer()
    {
        $this->drawerOpen = '';
    }

    public function setOrder($order)
    {
        $this->order = $order;
        $this->filterProducts();
    }

    public function setEtalase($etalase)
    {
        $this->etalase = $etalase;
        $this->filterProducts();
    }

    public function filterProducts()
    {
        $url = '/store/?min_price=' . $this->min_price . '&max_price=' . $this->max_price . '&rate=' . $this->rate . '&kategori=' . $this->kategori . '&order=' . $this->order . '&etalase=' . $this->etalase;
        return redirect($url);
    }

    public function render()
    {
        return view('livewire.pages.store.reviews');
    }
}
