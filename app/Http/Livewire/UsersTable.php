<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
    public $totalRecotds;
    public $loadAmount = 10;


    public function mount() {
        $this->totalRecotds = User::count();
    }

    public function loadMore() {
        $this->loadAmount += 10;
    }

    public function render()
    {
        return view('livewire.users-table')
            ->with('users' ,
                User::limit($this->loadAmount)->get());
    }
}
