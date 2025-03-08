<?php

namespace App\Livewire\Lead;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadRepositoryInterface;
use Livewire\{WithPagination, WithoutUrlPagination};

#[Title('Leads')]
class LeadPage extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    protected $leadRepository;

    public function boot(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * Deletes the Lead and closes the delete modal.
     */
    public function delete($id)
    {
        $this->leadRepository->delete($id);
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
            'statuses' => Status::withCount('leads')->orderBy('leads_count', 'desc')->limit(3)->get(),
            'leads' => $this->leadRepository->all($this->search),
        ]);
    }
}
