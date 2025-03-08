<?php

namespace App\Livewire\Lead;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\LeadOperationsForm;
use App\Interfaces\LeadRepositoryInterface;

#[Title('Leads')]
class LeadPage extends Component
{
    public $search = '';
    protected $leadRepository;
    public LeadOperationsForm $lead;

    public function boot(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * Displays the lead details for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->lead->get($id);
    }

    /**
     * Deletes the Lead and closes the delete modal.
     */
    public function delete()
    {
        $this->lead->destory();
        $this->redirect(route('leads.index'));
    }

    /**
     * Renders the lead page with a paginated list of sources filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.lead.lead-page', [
            'statuses' => Status::withCount('leads')->get(),
            'leads' => $this->leadRepository->all($this->search),
        ]);
    }
}
