<?php

namespace App\Livewire\Status;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\StatusRepositoryInterface;

#[Title('Statuses')]
class StatusPage extends Component
{
    public $search = '';
    protected $statusRepository;

    public function boot(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Deletes the current status and closes the delete modal.
     */
    public function delete($deleteId)
    {
        $this->statusRepository->delete($deleteId);
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
