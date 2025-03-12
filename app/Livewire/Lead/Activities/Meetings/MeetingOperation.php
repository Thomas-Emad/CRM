<?php

namespace App\Livewire\Lead\Activities\Meetings;

use App\Models\{User, Lead};
use Livewire\Component;
use App\Interfaces\Activities\MeetingRepositoryInterface;
use App\Livewire\Forms\MeetingsOperationform;

class MeetingOperation extends Component
{
    public $type, $customerName, $lead,  $lead_id, $id;
    public $assigned_id, $title, $reminder, $start, $end, $online, $link, $location, $notes;
    public MeetingsOperationform $meetingForm;
    protected $meetingRepository;


    public function boot(MeetingRepositoryInterface $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    /**
     * Saves the current meeting form and redirects to the lead show page.
     *
     * @return void
     */
    public function save()
    {
        $this->meetingForm->lead_id = $this->lead_id;

        $this->meetingForm->save();
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Retrieve a meeting from the database by its ID and populate the
     * component's properties with the meeting's details.
     *
     * @param  int  $id
     * @return void
     */
    public function get($id)
    {
        $this->meetingForm->get($id);
    }

    /**
     * Update an existing meeting for a lead and redirect to the lead show page.
     *
     * @return void
     */
    public function update()
    {
        $this->meetingForm->lead_id = $this->lead_id;
        $this->meetingForm->update();
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Deletes the meeting identified by the current component's ID and
     * redirects to the lead show page.
     *
     * @return void
     */
    public function destory()
    {
        $this->meetingForm->destory();
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
        return view('livewire.lead.activities.meetings.meeting-operation', [
            'lead' => $this->lead,
            'type' => $this->type,
            'users' => User::get(),
            'typeMeeting' => $this->meetingRepository->typeMeeting()
        ]);
    }
}
