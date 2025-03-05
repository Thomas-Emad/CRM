<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerOperationsForm;
use Livewire\Component;
use App\Models\{Group, Country, Currency};

class CustomerOperations extends Component
{
    public CustomerOperationsForm $customer;
    public $id, $type;

    /**
     * Saves a new customer and redirects to the customer index page.
     */
    public function save()
    {
        $this->customer->store();
        $this->redirect(route('customer.index', absolute: true));
    }

    /**
     * Update an existing customer and redirect to the customer index page.
     *
     * @return void
     */
    public function update()
    {
        $this->customer->update();
        $this->redirect(route('customer.index', absolute: true));
    }

    public function render()
    {
        if ($this->id) {
            $this->customer->get($this->id);
        }
        return view('livewire.customer.customer-operations', [
            'types' => $this->type,
            'groups' => Group::get(['id', 'name']),
            'countries' => Country::get(['id', 'name']),
            'currencies' => Currency::get(['id', 'name', 'code']),
        ]);
    }
}
