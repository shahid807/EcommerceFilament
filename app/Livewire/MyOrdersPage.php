<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
#[Title('My Orders')]
class MyOrdersPage extends Component
{
    use WithPagination;
    public function render()
    {
        $myOrders = Order::where('user_id', Auth::id())->latest()->simplePaginate(2);
        return view('livewire.my-orders-page', compact('myOrders'));
    }
}
