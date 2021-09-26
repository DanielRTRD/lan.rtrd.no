<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderCard extends Component
{
    public Order $order;

    public function mount(Order $order) {
        $this->order = $order;
        $this->paid = $order->paid;
        $this->ordered = $order->ordered;
    }

    public function paid() {
        $this->order->paid = !$this->order->paid;
        $this->order->save();
        $this->emit('$refresh');
    }

    public function ordered() {
        $this->order->ordered = !$this->order->ordered;
        $this->order->save();
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.order-card');
    }
}
