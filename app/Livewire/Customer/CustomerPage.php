<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\CustomerOperationsForm;
use App\Interfaces\CustomerRepositoryInterface;

#[Title('Customers')]
class CustomerPage extends Component
{
    public $search = '';
    protected $customerRepository;
    public CustomerOperationsForm $customer;

    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Displays the Customer details for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->customer->get($id);
    }

    /**
     * Deletes the Customer and closes the delete modal.
     */
    public function delete()
    {
        $this->customer->destroy();
        $this->redirect(route('customers.index'));
    }

    public function render()
    {
        return view('livewire.customer.customer-page', [
            'customers' => $this->customerRepository->all($this->search),
        ]);
    }
}
