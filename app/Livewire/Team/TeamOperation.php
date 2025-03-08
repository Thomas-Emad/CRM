<?php

namespace App\Livewire\Team;

use Livewire\Component;
use App\Interfaces\TeamRepositoryInterface;

class TeamOperation extends Component
{
    protected $teamRepository;
    public $id, $type, $name, $description;

    public function boot(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * Saves a new Team and redirects to the Team index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->teamRepository->store([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->redirect(route('teams.index'), navigate: true);
    }

    /**
     * Updates the Team and redirects to the Team index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->teamRepository->update($this->id, [
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->redirect(route('teams.index'), navigate: true);
    }

    /**
     * Retrieves a team by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the team to retrieve.
     */
    public function get(int $id): void
    {
        $team =  $this->teamRepository->get($id);
        $this->name = $team->name;
        $this->description = $team->description;
    }

    /**
     * Retrieves the validation rules for the team attributes.
     *
     * @return array The validation rules for the team attributes.
     */
    protected function rules(): array
    {
        return $this->teamRepository->rules();
    }

    /**
     * Renders the Team operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.team.team-operation', [
            'types' => $this->type,
        ]);
    }
}
