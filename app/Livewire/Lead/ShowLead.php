<?php

namespace App\Livewire\Lead;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadRepositoryInterface;
use App\Livewire\Forms\{InteractiveOperationForm, LeadOperationsForm};

#[Title('Show Lead')]
class ShowLead extends Component
{
    public $id, $lead;
    public LeadOperationsForm $leadForm;
    public InteractiveOperationForm $interactiveForm;

    protected $leadRepository;

    public function boot(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    public function mount()
    {
        $this->lead = $this->leadRepository->get($this->id);
        $this->leadForm->currentStatus = $this->lead->status_id;
    }

    /**
     * Deletes the interactive and closes the delete modal.
     */
    public function deleteInteractive($id)
    {
        $this->interactiveForm->destroy($id);
        $this->redirect(route('leads.show', ['lead' => $this->lead->id]), navigate: true);
    }

    /**
     * Deletes the interactive and closes the delete modal.
     */
    public function convertToCustomer($id)
    {
        $this->leadForm->convertToCustomer($id);
        $this->redirect(route('leads.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.lead.show-lead', [
            'lead' => $this->lead,
            'statuses' => Status::get(),
        ]);
    }
}
