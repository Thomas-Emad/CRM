<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Services\CustomerService;

class CustomerOperationsForm extends Form
{
    public $id, $name, $email, $phone, $company,
        $vat_number, $website, $group_id, $currency_id,
        $city, $address, $country_id, $zip_code;

    public $billing_id, $billing_country_id, $billing_city, $billing_street,
        $billing_zip_code;

    protected $customerService;

    public function boot(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    protected function rules()
    {
        return $this->customerService->rules();
    }

    protected function validationAttributes()
    {
        return $this->customerService->attributes();
    }

    /**
     * Store a new Customer in the database.
     *
     * @return void
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        $this->customerService->createCustomer($vaildatedData);
        $this->reset();
    }

    /**
     * Retrieve and populate form fields with an existing customer's data.
     *
     * @param int $id The ID of the customer to retrieve.
     * @return void
     */
    public function get($id)
    {
        $lead = $this->customerService->getUser($id);
        $billing = $lead->billings()->first();
        $this->id = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
        $this->company = $lead->company;
        $this->vat_number = $lead->vat_number;
        $this->website = $lead->website;
        $this->group_id = $lead->group_id;
        $this->currency_id = $lead->currency_id;
        $this->city = $lead->city;
        $this->address = $lead->address;
        $this->country_id = $lead->country_id;
        $this->zip_code = $lead->zip_code;

        $this->billing_id = $billing?->id;
        $this->billing_country_id = $billing?->country_id;
        $this->billing_city = $billing?->city;
        $this->billing_street = $billing?->street;
        $this->billing_zip_code = $billing?->zip_code;
    }

    /**
     * Update an existing customer's details.
     *
     * @return void
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $vaildatedData['billing_id'] = $this->billing_id;
        $this->customerService->updateCustomer($this->id, $vaildatedData);
        $this->reset();
    }

    /**
     * Delete a customer from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $this->customerService->deleteCustomer($this->id);
        $this->reset();
    }
}
