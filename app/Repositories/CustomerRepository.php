<?php

namespace App\Repositories;

use App\Enums\PriorityLeadEnum;
use App\Models\Lead;
use App\Interfaces\CustomerRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\Rule;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * Retrieve all lead with their ID, name, and description.
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

            ])
            ->where('name', 'like', "%$title%")
            ->where('is_customer', true)
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
            'assigned:id,name',
            'source:id,name',
            'status:id,name',
            'country:id,name',
            'type:id,name',
            'unit:id,name',
            'country:id,name',
            'billings',
            'billings.country:id,name',
        ])->findOrFail($id);
    }

    /**
     * Stores a new customer using the given attributes.
     *
     * @param array $attributes The attributes for creating the customer.
     *
     * @return \App\Models\Lead The customer if it was successfully created.
     */
    public function store(array $attributes): Lead
    {
        return  Lead::create(array_merge($attributes, [
            'is_customer' => true,
            'customer_since' => now()
        ]));
    }

    /**
     * Updates a lead by its ID.
     *
     * @param int $id The ID of the lead to update.
     * @param array $attributes The attributes to update with.
     *
     * @return \App\Models\Lead The lead if updated, otherwise null.
     */
    public function update(int $id, array $attributes): Lead
    {
        $lead = Lead::findorFail($id);
        $lead->update($attributes);
        return $lead;
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
            'name' => 'required|string|min:3|max:255',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country_id' => 'required|integer|exists:countries,id',

            'person_name' => 'required|string|max:255',
            'person_phone' => 'required|string|max:100',
            'person_email' => 'nullable|email|max:255',
            'person_position' => 'nullable|string|max:255',

            'source_id' => 'required|exists:sources,id',
            'date_acquired' => 'nullable|date',
            'lead_type_id' => 'nullable|exists:lead_types,id',

            'status_id' => 'required|exists:statuses,id',
            'section' => 'required|string|max:255',
            'lead_unit_id' => 'nullable|exists:lead_units,id',
            'team_id' => 'nullable|exists:teams,id',
            'assigned_id' => 'nullable|exists:users,id',

            'priority' => ['nullable', 'string', Rule::enum(PriorityLeadEnum::class)],
            'project_brief' => 'nullable|string|max:2000',

            'billing_country_id' => 'nullable|exists:countries,id',
            'billing_city' => 'nullable|string|min:3',
            'billing_street' => 'nullable|string|min:3',
            'billing_zip_code' => 'nullable|string|min:3',
        ];
    }

    /**
     * Maps the attribute names to their related model property names.
     *
     * This is used to easily convert the attributes from the request to the
     * related model's property names.
     *
     * @return array<string, string>
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
            'project_brief' => 'Project Brief',

            'billing_country_id' => 'billing country',
            'billing_city' => 'billing city',
            'billing_street' => 'billing street',
            'billing_zip_code' => 'billing zip code',
        ];
    }
}
