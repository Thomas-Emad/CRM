<?php

namespace App\Livewire\Source;

use Livewire\Component;
use App\Models\Source;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SourceOperationsForm;

#[Title('Sources')]
class SourcePage extends Component
{
    public SourceOperationsForm $sourceForm;

    use WithPagination;

    public $search = '';

    /**
     * Displays the source details for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->sourceForm->get($id);
    }

    /**
     * Deletes the source and closes the delete modal.
     */
    public function delete()
    {
        $this->sourceForm->destroy();
        $this->redirect(route('source.index'));
    }

    /**
     * Renders the source page with a paginated list of sources filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.source.source-page', [
            'sources' => Source::select(['id', 'name', 'description', 'website'])->where('name', 'like', "%$this->search%")->paginate(10),
        ]);
    }
}
