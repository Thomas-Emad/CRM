<?php

namespace App\Livewire\Lead\Activities\Calls;

use App\Models\Call;
use Livewire\Component;
use App\Livewire\Forms\NotesOperationform;
use App\Interfaces\Activities\CallRepositoryInterface;

class ShowCall extends Component
{
    public  $id, $activity;
    public NotesOperationform $noteForm;
    protected $callRepository;


    public function boot(CallRepositoryInterface $callRepository)
    {
        $this->callRepository = $callRepository;
    }

    public function mount()
    {
        $this->activity =  $this->callRepository->get($this->id);
    }

    public function storeNote()
    {
        $this->noteForm->lead_id = $this->activity->lead_id;
        $this->noteForm->store(Call::class, $this->activity->activityable->id);
    }


    public function deleteActivity($id)
    {
        $this->callRepository->delete($id);
        $this->redirect(route('leads.show', ['lead' => $this->activity->lead_id]), navigate: true);
    }


    public function deleteNote($id)
    {
        $this->noteForm->destory($id);
        $this->redirect(route('leads.activities.calls.show', ['lead' => $this->activity->lead_id, 'activity' => $this->activity->id]), navigate: true);
    }


    public function render()
    {
        return view('livewire.lead.activities.calls.show-call', [
            'activity' => $this->activity,
            'calls' => $this->callRepository->getCalls($this->activity->lead->id),
            'notes' => $this->callRepository->getNotes($this->activity->lead->id)
        ]);
    }
}
