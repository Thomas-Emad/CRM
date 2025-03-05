<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Lead;
use Livewire\Attributes\Title;

#[Title('Lead Operations Form')]
class LeadOperationsForm extends Form
{
    public $id, $status_id,
        $source_id, $assigned_id, $tags, $name, $address,
        $position, $city, $email, $company,
        $group_id, $website, $country_id, $phone,
        $zipCode, $leadValue, $description;

    public $currentStatus;

    protected $rules = [
        'status_id' => 'required|exists:statuses,id',
        'source_id' => 'required|exists:sources,id',
        'assigned_id' => 'required|exists:users,id',
        'tags' => 'nullable|string',
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'company' => 'nullable|string|max:255',
        'group_id' => 'nullable|exists:groups,id',
        'website' => 'nullable|string|url',
        'country_id' => 'required|exists:countries,id',
        'phone' => 'required|string|max:255',
        'zipCode' => 'nullable|string|max:255',
        'leadValue' => 'nullable|numeric',
        'description' => 'nullable|string|max:2000',
    ];

    protected function validationAttributes()
    {
        return [
            'status_id' => 'status',
            'source_id' => 'source',
            'assigned_id' => 'assigned',
            'group_id' => 'group',
            'country_id' => 'country',
        ];
    }

    /**
     * Store method to save the new Lead
     *
     * This method validates the form data, creates a new lead in the database
     * using the validated data, and then resets the form for the next input.
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        Lead::create($vaildatedData);
        $this->reset();
    }

    /**
     * Get method to retrieve the details of an existing lead
     *
     * This method fetches the lead by its ID from the database and populates
     * the form fields with the lead's details, such as name, description, and website.
     *
     * @param int $id The ID of the lead to be retrieved.
     */
    public function get($id)
    {
        $lead = Lead::findOrFail($id);
        $this->id = $lead->id;
        $this->status_id = $lead->status_id;
        $this->source_id = $lead->source_id;
        $this->assigned_id = $lead->assigned_id;
        $this->tags = $lead->tags;
        $this->name = $lead->name;
        $this->address = $lead->address;
        $this->position = $lead->position;
        $this->city = $lead->city;
        $this->email = $lead->email;
        $this->company = $lead->company;
        $this->group_id = $lead->group_id;
        $this->website = $lead->website;
        $this->country_id = $lead->country_id;
        $this->phone = $lead->phone;
        $this->zipCode = $lead->zip_code;
        $this->leadValue = $lead->lead_value;
        $this->description = $lead->description;
    }

    /**
     * Update method to modify an existing lead
     *
     * This method validates the form data, finds the lead by its ID, and updates
     * the lead's details with the validated data. It then resets the form for the next input.
     */
    public function update()
    {
        $vaildatedData = $this->validate();

        $lead = Lead::findOrFail($this->id);
        $lead->update($vaildatedData);

        $this->reset();
    }

    /**
     * Destroy method to delete an existing lead
     *
     * This method finds the lead by its ID, deletes it from the database, and
     * resets the form after deletion.
     */
    public function destory()
    {
        $lead = Lead::findOrFail($this->id);
        $lead->delete();
        $this->reset();
    }

    /**
     * Convert a lead to a customer by updating the `is_customer` and `status_id`.
     *
     * @param int $id The lead's ID to convert.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the lead is not found.
     */
    public function convertToCustomer($id)
    {
        $Interactive = Lead::findOrFail($id);
        $Interactive->update([
            'is_customer' => true,
            'status_id' => $this->currentStatus
        ]);
    }
}
