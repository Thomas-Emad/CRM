<?php

namespace App\Livewire\Lead\Activities\Calls;

use App\Models\User;
use App\Models\Lead;
use Livewire\Component;
use App\Interfaces\Activities\CallRepositoryInterface;

class CallOperation extends Component
{
    public $type, $id, $lead_id, $customerName, $lead;
    public $assigned_id, $typeCall, $date_calling,  $title, $reminder, $duration, $reason_id, $response_id, $notes;
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
     * Store method to save the new call
     *
     * This method validates the form data, creates a new call in the database
     * using the validated data, and then resets the form for the next input.
     */
    public function save()
    {
        $vaildatedData = $this->validate();
        $this->callRepository->store($vaildatedData);
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Get method to retrieve the details of an existing call
     *
     * This method fetches the call by its ID from the database and populates
     *
     * @param int $id The ID of the call to be retrieved.
     */
    public function get($id)
    {
        $call = $this->callRepository->get($id);
        $this->id = $call->id;
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
     * Update method to modify an existing call
     *
     * This method validates the form data, finds the call by its ID, and updates
     * the call's details with the validated data. It then resets the form for the next input.
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $this->callRepository->update($this->id, $vaildatedData);
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Destroy method to delete an existing call
     *
     * This method finds the call by its ID, deletes it from the database, and
     * resets the form after deletion.
     */
    public function destory()
    {
        $this->callRepository->delete($this->id);
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    public function mount()
    {
        $this->lead = Lead::select('id', 'name')->findOrFail($this->lead_id);
        $this->customerName = $this->lead->name;
    }



    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.lead.activities.calls.call-operation', [
            'lead' => $this->lead,
            'type' => $this->type,
            'users' => User::get(),
            'typeCalling' => $this->callRepository->typeCalling(),
            'callReason' => $this->callRepository->callReason(),
            'callResponse' => $this->callRepository->callResponse(),
        ]);
    }
}
