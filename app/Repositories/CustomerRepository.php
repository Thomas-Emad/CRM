<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Interfaces\CustomerRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
                'group:id,name',
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
            'group:id,name',
            'currency:id,name',
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
            'status_id' => 1,
            'is_customer' => true,
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
            'vat_number' => 'VAT number',
            'currency_id' => 'currency',
            'group_id' => 'group',
            'country_id' => 'country',
            'billing_country_id' => 'billing country',
        ];
    }
}
