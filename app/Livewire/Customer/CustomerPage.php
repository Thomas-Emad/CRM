<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\CustomerRepositoryInterface;

#[Title('Customers')]
class CustomerPage extends Component
{
    public $search = '';
    protected $customerRepository;

    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Deletes the Customer and closes the delete modal.
     */
    public function delete($id)
    {
        $this->customerRepository->delete($id);
        $this->redirect(route('customers.index'));
    }

    public function render()
    {
        return view('livewire.customer.customer-page', [
            'customers' => $this->customerRepository->all($this->search),
        ]);
    }
}
