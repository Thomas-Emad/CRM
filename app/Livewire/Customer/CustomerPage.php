<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerOperationsForm;
use Livewire\Component;
use App\Models\Lead;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Customers')]
class CustomerPage extends Component
{
    use WithPagination;
    public CustomerOperationsForm $customer;

    public $search = '';

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
        $this->redirect(route('customer.index'));
    }

    public function render()
    {
        return view('livewire.customer.customer-page', [
            'customers' => Lead::query()
                ->with([
                    'status:id,name,color',
                    'group:id,name',
                ])
                ->where('name', 'like', "%$this->search%")
                ->where('is_customer', true)
                ->paginate(10),
        ]);
    }
}
