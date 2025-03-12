<?php

namespace App\Livewire\Activities;

use App\Interfaces\Activities\MeetingRepositoryInterface;
use App\Livewire\Forms\MeetingsOperationform;
use Livewire\Component;
use App\Models\User;

class MeetingPage extends Component
{
    public $search = '';
    public $filter = 'all';
    protected $meetingRepository;
    public MeetingsOperationform $meetingForm;

    public function boot(MeetingRepositoryInterface $meetingRepository)
    {

        $this->meetingRepository = $meetingRepository;
    }

    /**
     * Save the meeting form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $this->meetingForm->save();
        $this->redirect(route('leads.activities.meetings.index'), navigate: true);
    }

    /**
     * Set the filter value for the activity list.
     *
     * @param  string  $filter
     * @return void
     */
    public function changeFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        return view('livewire.activities.meeting-page', [
            'meetings' => $this->meetingRepository->all($this->search, $this->filter),
            'leads' => $this->meetingRepository->getLeads(),
            'users' => User::get(),
            'typeMeeting' => $this->meetingRepository->typeMeeting()
        ]);
    }
}
