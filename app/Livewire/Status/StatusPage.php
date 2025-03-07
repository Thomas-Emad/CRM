<?php

namespace App\Livewire\Status;

use App\Interfaces\StatusRepositoryInterface;
use Livewire\Component;
use App\Models\Status;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Statuses')]
class StatusPage extends Component
{
    use WithPagination;

    public $search = '';
    public $statusId;
    public $statusName;
    public $statusColor;

    protected $statusRepository;

    public function boot(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Displays the status form for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $status = $this->statusRepository->get($id);
        $this->statusId = $status->id;
        $this->statusName = $status->name;
    }

    /**
     * Deletes the current status and closes the delete modal.
     */
    public function delete()
    {
        $this->statusRepository->delete($this->statusId);
        $this->redirect(route('statuses.index'));
    }

    /**
     * Renders the status page with paginated statuses filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.status.status-page', [
            'statuses' => $this->statusRepository->all($this->search),
        ]);
    }
}
