<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Interfaces\Activities\CallRepositoryInterface;

class CallsOperationform extends Form
{

    public $id,  $lead_id, $assigned_id, $typeCall, $date_calling,  $title, $reminder, $duration, $reason_id, $response_id, $notes;
    protected $callRepository;

    public function boot(CallRepositoryInterface $callRepository)
    {
        $this->callRepository = $callRepository;
    }

    protected function rules()
    {
        return $this->callRepository->rules();
    }

    protected function validationAttributes()
    {
        return $this->callRepository->attributes();
    }

    /**
     * Save the call into database.
     *
     * @return void
     */
    public function save()
    {
        $vaildatedData = $this->validate();
        $this->callRepository->store($vaildatedData);
    }

    /**
     * Retrieves a call from the database by its ID and populates the
     * component's properties with the call's details.
     *
     * @param int $id The ID of the call to be retrieved.
     *
     * @return void
     */
    public function get($id)
    {
        $call = $this->callRepository->get($id);
        $this->id = $call->id;
        $this->lead_id = $call->lead_id;
        $this->assigned_id = $call->assigned_id;
        $this->typeCall = $call->activityable->type;
        $this->date_calling = $call->activityable->call_date;
        $this->title = $call->title;
        $this->reminder = $call->activityable->reminder;
        $this->duration = $call->activityable->duration_call;
        $this->reason_id = $call->activityable->call_reason_id;
        $this->response_id = $call->activityable->call_response_id;
        $this->notes = $call->notes;
    }

    /**
     * Updates an existing call and redirects to the lead show page.
     *
     * @return void
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $this->callRepository->update($this->id, $vaildatedData);
    }

    /**
     * Delete method to delete an existing call
     *
     * This method deletes the call from the database by its ID.
     */
    public function destory()
    {
        $this->callRepository->delete($this->id);
    }
}
