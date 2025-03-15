<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\{Country, LeadType, LeadUnit, Source, Status, Team};
use App\Livewire\Forms\CustomerOperationsForm;
use App\Traits\{GetEmployeeSalesTrait, LeadHelperMethodsTrait};


class CustomerOperation extends Component
{
    use GetEmployeeSalesTrait, LeadHelperMethodsTrait;
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
            'countries' => Country::get(['id', 'name']),
            'types' => LeadType::get(['id', 'name']),
            'units' => LeadUnit::get(['id', 'name']),
            'statuses' => Status::get(['id', 'name']),
            'sources' => Source::get(['id', 'name']),
            'teams' => Team::get(['id', 'name']),
            'sections' => $this->sections(),
            'priorities' => $this->priorities(),
            'employees' => $this->employees($this->customer->team_id),

        ]);
    }
}
