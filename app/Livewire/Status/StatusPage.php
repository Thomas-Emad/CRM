<?php

namespace App\Livewire\Status;

use Livewire\Component;
use App\Models\Status;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\StatusOperationsForm;

#[Title('Statuses')]
class StatusPage extends Component
{
    public StatusOperationsForm $statusForm;

    use WithPagination;

    public $search = '';

    /**
     * Displays the status form for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->statusForm->get($id);
    }

    /**
     * Deletes the current status and closes the delete modal.
     */
    public function delete()
    {
        $this->statusForm->destory();
        $this->redirect(route('status.index'));
    }

    /**
     * Renders the status page with paginated statuses filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.status.status-page', [
            'statuses' => Status::select(['id', 'name', 'color'])->where('name', 'like', "%$this->search%")->paginate(10),
        ]);
    }
}
