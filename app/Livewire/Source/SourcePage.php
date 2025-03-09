<?php

namespace App\Livewire\Source;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\SourceRepositoryInterface;

#[Title('Sources')]
class SourcePage extends Component
{
    public $search = '';
    protected $sourceRepository;

    public function boot(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * Deletes the current source and closes the delete modal.
     */
    public function delete($id)
    {
        $this->sourceRepository->delete($id);
        $this->redirect(route('sources.index'));
    }

    /**
     * Renders the source page with paginated sources filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.source.source-page', [
            'sources' => $this->sourceRepository->all($this->search),
        ]);
    }
}
