<?php

namespace App\Livewire\Lead;

use App\Livewire\Forms\{InteractiveOperationForm, LeadOperationsForm};
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\{Lead, Status};

#[Title('Show Lead')]
class ShowLead extends Component
{
    public LeadOperationsForm $leadForm;
    public InteractiveOperationForm $interactiveForm;
    public $id, $lead;

    /**
     * Displays the interactive details for the given ID.
     *
     * @param int $id
     */
    public function showInteractive($id)
    {
        $this->interactiveForm->get($id);
    }

    /**
     * Deletes the interactive and closes the delete modal.
     */
    public function deleteInteractive()
    {
        $this->interactiveForm->destory();
        $this->dispatch('close-delete-modal');
    }

    /**
     * Deletes the interactive and closes the delete modal.
     */
    public function convertToCustomer($id)
    {
        $this->leadForm->convertToCustomer($id);
        $this->redirect(route('lead.index', absolute: true));
    }

    public function mount()
    {
        $this->lead = Lead::query()
            ->with([
                'group:id,name',
                'status:id,name',
                'assigned:id,name',
                'source:id,name',
                'country:id,name',
                'interactives',
                'interactives.status:id,name,color',
            ])
            ->where('id', $this->id)
            ->first();
        $this->leadForm->currentStatus = $this->lead->status_id;
    }


    public function render()
    {
        return view('livewire.lead.show-lead', [
            'lead' => $this->lead,
            'statuses' => Status::get(),
        ]);
    }
}
