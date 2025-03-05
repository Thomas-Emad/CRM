<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Lead;

class ShowCustomer extends Component
{

    public $id;

    public function render()
    {
        return view('livewire.customer.show-customer', [
            'customer' => Lead::with([
                'assigned:id,user',
                'source:id,name',
                'status:id,name',
                'group:id,name',
                'currency:id,name',
                'country:id,name',
                'billings',
                'billings.country:id,name'
            ])->findOrFail($this->id)
        ]);
    }
}
