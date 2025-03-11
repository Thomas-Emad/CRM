<?php

namespace App\Livewire\Lead\Activities\Meetings;

use Livewire\Component;
use App\Livewire\Forms\NotesOperationform;
use App\Interfaces\Activities\MeetingRepositoryInterface;
use App\Models\Meeting;

class ShowMeeting extends Component
{
    public  $id, $activity;
    public NotesOperationform $noteForm;
    protected $meetingRepository;


    public function boot(MeetingRepositoryInterface $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function mount()
    {
        $this->activity =  $this->meetingRepository->get($this->id);
    }

    public function storeNote()
    {
        $this->noteForm->lead_id = $this->activity->lead_id;
        $this->noteForm->store(Meeting::class, $this->activity->activityable->id);
    }


    public function deleteActivity($id)
    {
        $this->meetingRepository->delete($id);
        $this->redirect(route('leads.show', ['lead' => $this->activity->lead_id]), navigate: true);
    }


    public function deleteNote($id)
    {
        $this->noteForm->destory($id);
        $this->redirect(route('leads.activities.meetings.show', ['lead' => $this->activity->lead_id, 'activity' => $this->activity->id]), navigate: true);
    }


    public function render()
    {
        return view('livewire.lead.activities.meetings.show-meeting', [
            'activity' => $this->activity,
            'meetings' => $this->meetingRepository->getMeetings($this->activity->lead->id),
            'notes' => $this->meetingRepository->getNotes($this->activity->lead->id)
        ]);
    }
}
