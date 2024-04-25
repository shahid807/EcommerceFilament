<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('categories')]
class Categoriespage extends Component
{    
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('livewire.categoriespage', compact('categories'));
    }
}
