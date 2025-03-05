<?php

namespace App\Livewire\Lead;

use App\Livewire\Forms\LeadOperationsForm;
use Livewire\Component;
use App\Models\Lead;
use App\Models\Status;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Leads')]
class LeadPage extends Component
{
    use WithPagination;
    public LeadOperationsForm $lead;

    public $search = '';

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
        $this->redirect(route('lead.index'));
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
            'leads' => Lead::query()
                ->with([
                    'status:id,name,color',
                    'interactives:id,created_at',
                    'assigned:id,name',
                    'source:id,name',
                    'country:id,name',
                ])
                ->where('name', 'like', "%$this->search%")
                ->orderBy('is_customer', 'desc')
                ->paginate(10),
        ]);
    }
}
