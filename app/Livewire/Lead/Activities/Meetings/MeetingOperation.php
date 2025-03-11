<?php

namespace App\Livewire\Lead\Activities\Meetings;

use App\Models\{User, Lead};
use Livewire\Component;
use App\Interfaces\Activities\MeetingRepositoryInterface;

class MeetingOperation extends Component
{
    public $type, $id, $lead_id, $customerName, $lead;
    public $assigned_id, $title, $reminder, $start, $end, $online, $link, $location, $notes;
    protected $meetingRepository;

    public function boot(MeetingRepositoryInterface $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    protected function rules()
    {
        return $this->meetingRepository->rules();
    }

    protected function validationAttributes()
    {
        return $this->meetingRepository->attributes();
    }

    /**
     * Store method to save the new meeting
     *
     * This method validates the form data, creates a new meeting in the database
     * using the validated data, and then resets the form for the next input.
     */
    public function save()
    {
        $vaildatedData = $this->validate();
        $this->meetingRepository->store($vaildatedData);
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Get method to retrieve the details of an existing meeting
     *
     * This method fetches the meeting by its ID from the database and populates
     *
     * @param int $id The ID of the meeting to be retrieved.
     */
    public function get($id)
    {
        $meeting = $this->meetingRepository->get($id);
        $this->id = $meeting->id;
        $this->reminder = $meeting->reminder;
        $this->assigned_id = $meeting->assigned_id;
        $this->start = $meeting->activityable->start;
        $this->end = $meeting->activityable->end;
        $this->title = $meeting->title;
        $this->online = $meeting->activityable->online;
        $this->location = $meeting->activityable->location;
        $this->link = $meeting->activityable->link;
        $this->notes = $meeting->notes;
    }

    /**
     * Update method to modify an existing meeting
     *
     * This method validates the form data, finds the meeting by its ID, and updates
     * the meeting's details with the validated data. It then resets the form for the next input.
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $this->meetingRepository->update($this->id, $vaildatedData);
        $this->redirect(route('leads.show', ['lead' => $this->lead_id]), navigate: true);
    }

    /**
     * Destroy method to delete an existing meeting
     *
     * This method finds the meeting by its ID, deletes it from the database, and
     * resets the form after deletion.
     */
    public function destory()
    {
        $this->meetingRepository->delete($this->id);
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
