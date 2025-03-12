<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Interfaces\Activities\MeetingRepositoryInterface;

class MeetingsOperationform extends Form
{
    public $id, $lead_id, $assigned_id, $title, $reminder, $start, $end, $online, $link, $location, $notes;
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
     * Save method to save a new call
     *
     * This method validates the form data and stores a new call in the database
     * using the validated data.
     */
    public function save()
    {
        $vaildatedData = $this->validate();
        $this->meetingRepository->store($vaildatedData);
    }

    /**
     * Get method to retrieve the details of an existing call
     *
     * This method fetches the call by its ID from the database and populates
     * the form with the call's details.
     *
     * @param int $id The ID of the call to be retrieved.
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
     * Update method to modify an existing call
     *
     * This method validates the form data, finds the call by its ID, and updates
     * the call's details with the validated data.
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $this->meetingRepository->update($this->id, $vaildatedData);
    }

    /**
     * Destroy method to delete an existing call
     *
     * This method deletes the call from the database by its ID.
     */
    public function destory()
    {
        $this->meetingRepository->delete($this->id);
    }
}
