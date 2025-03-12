<?php

namespace App\Livewire\Lead;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadRepositoryInterface;
use App\Livewire\Forms\{LeadOperationsForm, NotesOperationform};
use App\Models\Lead;

#[Title('Show Lead')]
class ShowLead extends Component
{
    public $id, $lead;
    public LeadOperationsForm $leadForm;
    public NotesOperationform $noteForm;
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
     * Saves a new note for a lead and redirects to the lead show page.
     *
     * @return void
     */
    public function saveNote()
    {
        $this->noteForm->lead_id = $this->id;
        $this->noteForm->store(Lead::class, $this->id);
        $this->redirect(route('leads.show', ['lead' => $this->lead->id]), navigate: true);
    }

    /**
     * Deletes the note with the given ID and redirects the user to the
     * previous page.
     *
     * @param int $id The ID of the note to delete.
     *
     * @return void
     */
    public function deleteNote($id)
    {
        $this->noteForm->destory($id);
        $this->redirect(route('leads.show', ['lead' => $this->lead->id]), navigate: true);
    }

    /**
     * Converts a lead to a customer by updating the `is_customer` and `status_id` then redirects to the leads index.
     *
     * @param int $id The lead's ID to convert.
     *
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the lead is not found.
     */
    public function convertToCustomer($id)
    {
        $this->leadForm->convertToCustomer($id);
        $this->redirect(route('leads.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.lead.show-lead', [
            'activities' => $this->lead->activities,
            'lead' => $this->lead,
            'statuses' => Status::get(),
        ]);
    }
}
