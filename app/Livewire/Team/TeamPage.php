<?php

namespace App\Livewire\Team;

use Livewire\Component;
use App\Interfaces\TeamRepositoryInterface;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TeamPage extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    private $teamRepository;

    public function boot(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * Deletes the current Team and closes the delete modal.
     */
    public function delete($id)
    {
        $this->teamRepository->delete($id);
        $this->redirect(route('teams.index'));
    }

    /**
     * Renders the status page with paginated statuses filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.team.team-page', [
            'teams' => $this->teamRepository->all($this->search),
        ]);
    }
}
