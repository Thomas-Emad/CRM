<?php

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Validation\Rule;
use App\Enums\PriorityLeadEnum;
use App\Interfaces\LeadRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LeadRepository implements LeadRepositoryInterface
{
    /**
     * Retrieve all leads with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return Lead::query()
            ->with([
                'status:id,name,color',
                'assigned:id,name',
                'source:id,name',
                'type:id,name',
                'unit:id,name',
                'team:id,name',
                'country:id,name',
                'activities:id,created_at',
                'billings'
            ])
            ->where('name', 'like', "%$title%")
            ->orderBy('is_customer', 'desc')
            ->paginate(10);
    }

    /**
     * Retrieves a lead by its ID.
     *
     * @param int $id The ID of the lead to retrieve.
     *
     * @return \App\Models\Lead|null The lead if found, otherwise null.
     */
    public function get(int $id): ?Lead
    {
        return Lead::with([
            'status:id,name',
            'assigned:id,name',
            'type:id,name',
            'unit:id,name',
            'source:id,name',
            'country:id,name',
            'activities',
            'activities.assigned:id,name',
            'activities.activityable',
            'allNotes',
            'allNotes.creator:id,name',
        ])->findOrFail($id);
    }

    /**
     * Stores a new lead using the given attributes.
     *
     * @param array $attributes The attributes for creating the lead.
     *
     * @return \App\Models\Lead The lead if it was successfully created, otherwise null.
     */
    public function store(array $attributes): Lead
    {
        return Lead::create($attributes);
    }

    /**
     * Updates a lead by its ID.
     *
     * @param int $id The ID of the lead to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the lead was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $lead = Lead::findorFail($id);
        return $lead->update($attributes);
    }

    /**
     * Deletes a lead by its ID.
     *
     * @param int $id The ID of the lead to delete.
     *
     * @return bool True if the lead was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $lead = Lead::findOrFail($id);
        return  $lead->delete();
    }

    /**
     * The validation rules for the lead.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'parent_account' => 'nullable|string|max:255',
            'contractor' => 'nullable|string|max:255',
            'developer' => 'nullable|string|max:255',
            'consultant' => 'nullable|string|max:255',
            'investor' => 'nullable|string|max:255',
            'architect' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'person_name' => 'nullable|string|max:255',
            'person_phone' => 'nullable|string|max:100',
            'person_email' => 'nullable|email|max:255',
            'person_position' => 'nullable|string|max:255',
            'next_step' => 'nullable|string|max:255',
            'next_step_date' => 'nullable|date',
            'step_description' => 'nullable|string',
            'decision_makers' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'source_id' => 'nullable|exists:sources,id',
            'team_id' => 'nullable|exists:teams,id',
            'lead_type_id' => 'nullable|exists:lead_types,id',
            'lead_unit_id' => 'nullable|exists:lead_units,id',
            'assigned_id' => 'nullable|exists:users,id',
            'priority' => ['nullable', Rule::enum(PriorityLeadEnum::class)],
            'date_acquired' => 'nullable|date',
            'lead_value' => 'nullable|numeric',
            'project_brief' => 'nullable|string',
        ];
    }

    /**
     * Maps the attribute names to their related model property names.
     *
     * This is used to easily convert the attributes from the request to the
     * related model's property names.
     *
     * @return array<string,string>
     */
    public function attributes(): array
    {
        return [
            'person_name' => 'Person name',
            'person_phone' => 'Person phone',
            'person_email' => 'Person email',
            'person_position' => 'Person position',
            'team_id' => 'Team',
            'lead_type_id' => 'Lead type',
            'lead_unit_id' => 'Lead unit',
            'status_id' => 'status',
            'source_id' => 'source',
            'assigned_id' => 'assigned',
            'country_id' => 'country',
            'lead_type_id' => 'Lead Type',
            'lead_unit_id' => 'Lead Unit',
            'date_acquired' => 'Date Acquired',
            'lead_value' => 'Estimated Budget Range',
            'project_brief' => 'Project Brief',
        ];
    }

    /**
     * Converts a lead to a customer by updating the `is_customer` and `status_id`.
     *
     * @param int $id The lead's ID to convert.
     * @param int $status The status ID to set the lead to.
     *
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the lead is not found.
     */
    public function convertToCustomer(int $id, int $status): void
    {
        $lead = Lead::findOrFail($id);
        $lead->update([
            'is_customer' => true,
            'status_id' => $status,
            'customer_since' => now(),
        ]);
    }
}
