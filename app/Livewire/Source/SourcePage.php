<?php

namespace App\Livewire\Source;

use App\Interfaces\SourceRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Sources')]
class SourcePage extends Component
{
    use WithPagination;

    public $search = '';
    public $sourceId, $sourceName, $website, $description;

    protected $sourceRepository;

    public function boot(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * Displays the source form for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $source = $this->sourceRepository->get($id);
        $this->sourceId = $source->id;
        $this->sourceName = $source->name;
    }

    /**
     * Deletes the current source and closes the delete modal.
     */
    public function delete()
    {
        $this->sourceRepository->delete($this->sourceId);
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
