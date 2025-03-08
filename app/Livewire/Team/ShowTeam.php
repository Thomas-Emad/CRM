<?php

namespace App\Livewire\Team;

use Livewire\Component;
use App\Interfaces\TeamRepositoryInterface;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowTeam extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $id, $search = '', $searchModal = '';
    protected $teamRepository;

    public function boot(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function addEmployee(int $id)
    {
        $this->teamRepository->addEmployee($this->id, $id);
        $this->searchModal = '';
    }

    public function removeEmployee(int $id)
    {
        $this->teamRepository->removeEmployee($this->id, $id);
        $this->searchModal = '';
    }

    public function render()
    {
        return view('livewire.team.show-team', [
            'team' => $this->teamRepository->getWithEmployees($this->id, $this->search),
            'users' => $this->teamRepository->getUsers($this->searchModal),
        ]);
    }
}
