<?php

namespace App\Livewire\Lead;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\LeadOperationsForm;
use App\Models\{User, Country, Group, Source, Status, Team};

#[Title('Lead Operation')]
class LeadOperation extends Component
{
    public $id, $type;
    public LeadOperationsForm $lead;

    /**
     * Retrieve a collection of users associated with a specific team.
     *
     * This method queries the users who belong to the team specified
     * by the given team ID and returns their IDs and names.
     *
     * @param int|null $team_id The ID of the team to filter users by.
     * @return \Illuminate\Database\Eloquent\Collection A collection of users with 'id' and 'name' attributes.
     */
    private function employees(?int $team_id)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'sales');
        })
            ->whereHas('teams', function ($query) use ($team_id) {
                $query->where('teams.id', $team_id);
            })->get(['id', 'name']);
    }

    /**
     * Save a new lead and redirect to the lead index page.
     *
     * @return void
     */
    public function save()
    {
        $this->lead->store();
        $this->redirect(route('leads.index'), navigate: true);
    }

    /**
     * Update an existing lead and redirect to the lead index page.
     *
     * @return void
     */
    public function update()
    {
        $this->lead->update();
        $this->redirect(route('leads.index'), navigate: true);
    }

    public function render()
    {
        if ($this->id) {
            $this->lead->get($this->id);
        }
        return view('livewire.lead.lead-operation', [
            'type' => $this->type,
            'groups' => Group::get(['id', 'name']),
            'countries' => Country::get(['id', 'name']),
            'statuses' => Status::get(['id', 'name']),
            'sources' => Source::get(['id', 'name']),
            'teams' => Team::get(['id', 'name']),
            'employees' => $this->employees($this->lead->team_id),
        ]);
    }
}
