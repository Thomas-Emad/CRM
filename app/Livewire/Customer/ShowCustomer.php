<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Interfaces\CustomerRepositoryInterface;

class ShowCustomer extends Component
{
    public $id;
    protected $customerRepository;

    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function render()
    {
        return view('livewire.customer.show-customer', [
            'customer' => $this->customerRepository->get($this->id),
        ]);
    }
}
