<?php

namespace App\Livewire\LeadType;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadTypeRepositoryInterface;
use Livewire\{WithPagination, WithoutUrlPagination};

#[Title('LeadTypes')]
class LeadTypePage extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    protected $typeRepository;

    public function boot(LeadTypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Deletes the current type and closes the delete modal.
     */
    public function delete($id)
    {
        $this->typeRepository->delete($id);
        $this->redirect(route('lead-types.index'), navigate: true);
    }

    /**
     * Renders the type page with paginated types filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.lead-type.type-page', [
            'types' => $this->typeRepository->all($this->search),
        ]);
    }
}
