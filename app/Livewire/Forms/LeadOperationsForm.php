<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Title;
use App\Interfaces\LeadRepositoryInterface;

#[Title('Lead Operations Form')]
class LeadOperationsForm extends Form
{
    public $id;
    public $name, $company, $parent_account, $contractor, $developer,
        $consultant, $investor, $architect, $industry, $address,
        $city, $country_id, $person_name, $person_phone, $person_email,
        $person_position, $next_step, $next_step_date, $step_description,
        $decision_makers, $section, $status_id, $source_id, $team_id,
        $lead_type_id, $lead_unit_id, $assigned_id, $priority,
        $date_acquired, $lead_value, $project_brief;

    public $currentStatus;

    protected $leadRepository;

    public function boot(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    protected function rules()
    {
        return $this->leadRepository->rules();
    }

    protected function validationAttributes()
    {
        return $this->leadRepository->attributes();
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
        $this->leadRepository->store($vaildatedData);
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
        $lead = $this->leadRepository->get($id);
        $this->id = $lead->id;
        $this->name = $lead->name;
        $this->company = $lead->company;
        $this->parent_account = $lead->parent_account;
        $this->contractor = $lead->contractor;
        $this->developer = $lead->developer;
        $this->consultant = $lead->consultant;
        $this->investor = $lead->investor;
        $this->architect = $lead->architect;
        $this->industry = $lead->industry;
        $this->address = $lead->address;
        $this->city = $lead->city;
        $this->country_id = $lead->country_id;
        $this->person_name = $lead->person_name;
        $this->person_phone = $lead->person_phone;
        $this->person_email = $lead->person_email;
        $this->person_position = $lead->person_position;
        $this->next_step = $lead->next_step;
        $this->next_step_date = $lead->next_step_date;
        $this->step_description = $lead->step_description;
        $this->decision_makers = $lead->decision_makers;
        $this->section = $lead->section;
        $this->status_id = $lead->status_id;
        $this->source_id = $lead->source_id;
        $this->lead_type_id = $lead->lead_type_id;
        $this->lead_unit_id = $lead->lead_unit_id;
        $this->team_id = $lead->team_id;
        $this->assigned_id = $lead->assigned_id;
        $this->priority = $lead->priority;
        $this->date_acquired = $lead->date_acquired;
        $this->lead_value = $lead->lead_value;
        $this->project_brief = $lead->project_brief;
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
        $this->leadRepository->update($this->id, $vaildatedData);
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
        $this->leadRepository->delete($this->id);
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
        $this->leadRepository->convertToCustomer($id, $this->currentStatus);
    }
}
