<?php

namespace App\Livewire\Lead\Activities\Calls;

use App\Models\User;
use App\Models\Lead;
use Livewire\Component;
use App\Interfaces\Activities\CallRepositoryInterface;
use App\Livewire\Forms\CallsOperationform;

class CallOperation extends Component
{
    public $type, $lead_id, $id, $customerName, $lead;
    public CallsOperationform $callForm;
    protected $callRepository;

    public function boot(CallRepositoryInterface $callRepository)
    {
        $this->callRepository = $callRepository;
    }

    public function save()
    {
        $this->callForm->lead_id = $this->lead->id;
        $this->callForm->save();
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

        $this->callForm->get($id);
    }

    /**
     * Update method to modify an existing call
     *
     * This method validates the form data, finds the call by its ID, and updates
     * the call's details with the validated data. It then resets the form for the next input.
     */
    public function update()
    {
        $this->callForm->update();
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }


    /**
     * Delete method to delete an existing call
     *
     * This method finds the call by its ID, deletes it from the database, and
     * resets the form after deletion.
     */
    public function destory()
    {
        $this->callForm->update();
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
