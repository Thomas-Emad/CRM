<?php

namespace App\Livewire\LeadUnit;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadUnitRepositoryInterface;
use Livewire\{WithPagination, WithoutUrlPagination};

#[Title('LeadUnits')]
class LeadUnitPage extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    protected $unitRepository;

    public function boot(LeadUnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    /**
     * Deletes the current unit and closes the delete modal.
     */
    public function delete($id)
    {
        $this->unitRepository->delete($id);
        $this->redirect(route('lead-units.index'), navigate: true);
    }

    /**
     * Renders the unit page with paginated units filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.lead-unit.unit-page', [
            'units' => $this->unitRepository->all($this->search),
        ]);
    }
}
