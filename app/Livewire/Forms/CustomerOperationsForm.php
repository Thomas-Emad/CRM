<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Services\CustomerService;

class CustomerOperationsForm extends Form
{
    public $id, $name, $company, $address, $city, $country_id,
    $person_name, $person_phone, $person_email, $person_position,
    $source_id, $date_acquired, $lead_type_id,
    $status_id, $section, $lead_unit_id, $team_id, $assigned_id,
    $priority, $project_brief;

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
        $this->company = $lead->company;
        $this->address = $lead->address;
        $this->city = $lead->city;
        $this->country_id = $lead->country_id;
        $this->person_name = $lead->person_name;
        $this->person_phone = $lead->person_phone;
        $this->person_email = $lead->person_email;
        $this->person_position = $lead->person_position;
        $this->source_id = $lead->source_id;
        $this->date_acquired = $lead->date_acquired;
        $this->lead_type_id = $lead->lead_type_id;
        $this->status_id = $lead->status_id;
        $this->section = $lead->section;
        $this->lead_unit_id = $lead->lead_unit_id;
        $this->team_id = $lead->team_id;
        $this->assigned_id = $lead->assigned_id;
        $this->priority = $lead->priority;
        $this->project_brief = $lead->project_brief;

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
