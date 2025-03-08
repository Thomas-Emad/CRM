<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\{Group, Country, Currency};
use App\Livewire\Forms\CustomerOperationsForm;

class CustomerOperation extends Component
{
    public CustomerOperationsForm $customer;
    public $id, $type;

    /**
     * Saves a new customer and redirects to the customer index page.
     */
    public function save()
    {
        $this->customer->store();
        $this->redirect(route('customers.index'), navigate: true);
    }

    /**
     * Update an existing customer and redirect to the customer index page.
     *
     * @return void
     */
    public function update()
    {
        $this->customer->update();
        $this->redirect(route('customers.index'), navigate: true);
    }

    public function render()
    {
        if ($this->id) {
            $this->customer->get($this->id);
        }
        return view('livewire.customer.customer-operation', [
            'types' => $this->type,
            'groups' => Group::get(['id', 'name']),
            'countries' => Country::get(['id', 'name']),
            'currencies' => Currency::get(['id', 'name', 'code']),
        ]);
    }
}
