<?php

namespace App\Services;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\BillingCustomer;
use App\Models\Lead;

class CustomerService
{
    protected CustomerRepositoryInterface $customerRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Return the validation rules for the customer.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return $this->customerRepository->rules();
    }

    /**
     * The attributes that are used to validate the customer.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return $this->customerRepository->attributes();
    }

    /**
     * Retrieve a lead by its ID.
     *
     * @param int $id The ID of the lead to retrieve.
     * @return \App\Models\Lead|null The lead if found, otherwise null.
     */
    public function getUser(int $id): ?Lead
    {
        return  $this->customerRepository->get($id);
    }

    /**
     * Create a new customer and their billing information.
     *
     * @param array $attributes An associative array of customer attributes.
     *                          Expected keys include 'billing_city', 'billing_country_id',
     *                          'billing_street', and 'billing_zip_code'.
     * @return void
     */
    public function createCustomer(array $attributes): void
    {
        $lead = $this->customerRepository->store($attributes);
        $this->createBilling(
            $lead->id,
            $attributes['billing_city'] ?? null,
            $attributes['billing_country_id'] ?? null,
            $attributes['billing_street'] ?? null,
            $attributes['billing_zip_code'] ?? null
        );
    }

    /**
     * Updates a customer and their billing information.
     *
     * @param int $id The ID of the customer to update.
     * @param array $attributes An associative array of customer attributes.
     *                          Expected keys include 'billing_city', 'billing_country_id',
     *                          'billing_street', and 'billing_zip_code'.
     * @return void
     */
    public function updateCustomer(int $id, array $attributes): void
    {
        $lead = $this->customerRepository->update($id, $attributes);
        $this->updateOrCreateBilling(
            $lead->id,
            $attributes['billing_id'] ?? null,
            $attributes['billing_city'] ?? null,
            $attributes['billing_country_id'] ?? null,
            $attributes['billing_street'] ?? null,
            $attributes['billing_zip_code'] ?? null
        );
    }

    /**
     * Create a new billing customer for the given lead.
     *
     * @param int $leadId The ID of the lead to create a billing customer for.
     * @param string $city The city of the billing customer.
     * @param int $country_id The ID of the country of the billing customer.
     * @param string $street The street of the billing customer.
     * @param string $zip_code The zip code of the billing customer.
     * @return \App\Models\BillingCustomer|bool The created billing customer if successful, otherwise false.
     */
    private function createBilling(int $leadId, $city,  $country_id,  $street, $zip_code): BillingCustomer|bool
    {
        if (
            isset($city) ||
            isset($country_id) ||
            isset($street) ||
            isset($zip_code)
        ) {
            return    BillingCustomer::create([
                'customer_id' => $leadId,
                'city' => $city,
                'country_id' => $country_id,
                'street' => $street,
                'zip_code' => $zip_code
            ]);
        }
        return false;
    }

    /**
     * Update or create a billing customer for the given lead.
     *
     * If the $billingId is set, this method will update the billing customer with the given ID.
     * If the $billingId is not set, this method will create a new billing customer for the given lead.
     *
     * @param int $leadId The ID of the lead to update or create a billing customer for.
     * @param $billingId The ID of the billing customer to update. If not set, a new billing customer will be created.
     * @param string $city The city of the billing customer.
     * @param int $country_id The ID of the country of the billing customer.
     * @param string $street The street of the billing customer.
     * @param string $zip_code The zip code of the billing customer.
     * @return \App\Models\BillingCustomer|bool The updated or created billing customer if successful, otherwise false.
     */
    private function updateOrCreateBilling(int $leadId, $billingId,  $city,  $country_id,   $street,   $zip_code): BillingCustomer|bool
    {
        if (
            isset($city) ||
            isset($country_id) ||
            isset($street) ||
            isset($zip_code)
        ) {
            return BillingCustomer::updateOrCreate(
                [
                    'id' => $billingId
                ],
                [
                    'customer_id' => $leadId,
                    'city' => $city,
                    'country_id' => $country_id,
                    'street' => $street,
                    'zip_code' => $zip_code
                ]
            );
        }
        return false;
    }

    /**
     * Delete a customer by their ID.
     *
     * @param int $id The ID of the customer to delete.
     * @return void
     */
    public function deleteCustomer(int $id)
    {
        $this->customerRepository->delete($id);
    }
}
