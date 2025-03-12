<?php

namespace App\Livewire\Activities;

use App\Interfaces\Activities\CallRepositoryInterface;
use App\Livewire\Forms\CallsOperationform;
use Livewire\Component;
use App\Models\User;

class CallPage extends Component
{
    public $search = '';
    public $filter = 'all';
    protected $callRepository;
    public CallsOperationform $callForm;

    public function boot(CallRepositoryInterface $callRepository)
    {
        $this->callRepository = $callRepository;
    }

    /**
     * Save the call form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $this->callForm->save();
        $this->redirect(route('leads.activities.calls.index'), navigate: true);
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
        return view('livewire.activities.call-page', [
            'calls' => $this->callRepository->all($this->search, $this->filter),
            'leads' => $this->callRepository->getLeads(),
            'users' => User::get(),
            'typeCalling' => $this->callRepository->typeCalling(),
            'callReason' => $this->callRepository->callReason(),
            'callResponse' => $this->callRepository->callResponse(),
        ]);
    }
}
