<?php

namespace App\Livewire\Forms;

use App\Models\BillingCustomer;
use App\Models\Lead;
use Livewire\Form;

class CustomerOperationsForm extends Form
{
    public $id, $name, $email, $phone, $company, $vat_number,
        $website, $group_id, $currency_id, $city,
        $address, $country_id, $zip_code;

    public $billing_id,  $billing_country_id, $billing_city, $billing_street, $billing_zip_code;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|min:3',
        'phone' => 'required|string|min:3',
        'company' => 'required|string|min:3',
        'vat_number' => 'nullable|string|min:3',
        'website' => 'nullable|url|min:3',
        'group_id' => 'required|integer|exists:groups,id',
        'currency_id' => 'required|integer|exists:currencies,id',
        'city' => 'required|string|min:3',
        'address' => 'required|string|min:3',
        'country_id' => 'required|integer|exists:countries,id',
        'zip_code' => 'required|string|min:3',

        'billing_country_id' => 'nullable|integer|exists:countries,id',
        'billing_city' => 'nullable|string|min:3',
        'billing_street' => 'nullable|string|min:3',
        'billing_zip_code' => 'nullable|string|min:3',
    ];

    /**
     * Get the validation attributes for the form.
     *
     * @return array The mapping of field names to user-friendly labels.
     */
    protected function validationAttributes()
    {
        return [
            'vat_number' => 'VAT number',
            'currency_id' => 'currency',
            'group_id' => 'group',
            'country_id' => 'country',
            'billing_country_id' => 'billing country',
        ];
    }

    /**
     * Store a new Customer in the database.
     *
     * @return void
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        $lead =   Lead::create(array_merge($vaildatedData, [
            'status_id' => 1,
            'is_customer' => true,
        ]));

        if (isset($this->billing_city) || isset($this->billing_country_id) || isset($this->billing_street) ||  $this->billing_zip_code) {
            BillingCustomer::create([
                'customer_id' => $lead->id,
                'city' => $this->billing_city,
                'country_id' => $this->billing_country_id,
                'street' => $this->billing_street,
                'zip_code' => $this->billing_zip_code
            ]);
        }

        $this->reset();
    }

    /**
     * Retrieve and populate form fields with an existing group's data.
     *
     * @param int $id The ID of the group to retrieve.
     * @return void
     */
    public function get($id)
    {
        $lead = Lead::with('billings')->findOrFail($id);
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

        $this->billing_id = $billing?->country_id;
        $this->billing_country_id = $billing?->country_id;
        $this->billing_city = $billing?->city;
        $this->billing_street = $billing?->street;
        $this->billing_zip_code = $billing?->zip_code;
    }

    /**
     * Update an existing group's details.
     *
     * @return void
     */
    public function update()
    {
        $vaildatedData = $this->validate();

        $lead = Lead::findOrFail($this->id);
        $lead->update($vaildatedData);

        if (!empty($this->billing_city) || !empty($this->billing_country_id) || !empty($this->billing_street) || !empty($this->billing_zip_code)) {
            BillingCustomer::updateOrCreate(
                [
                    'id' => $this->billing_id
                ],
                [
                    'customer_id' => $lead->id,
                    'city' => $this->billing_city,
                    'country_id' => $this->billing_country_id,
                    'street' => $this->billing_street,
                    'zip_code' => $this->billing_zip_code
                ]
            );
        }


        $this->reset();
    }

    /**
     * Delete a group from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $lead = Lead::findOrFail($this->id);
        $lead->delete();
        $this->reset();
    }
}
