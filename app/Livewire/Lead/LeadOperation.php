<?php

namespace App\Livewire\Lead;

use App\Enums\PriorityLeadEnum;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\LeadOperationsForm;
use App\Models\{Country, LeadType, LeadUnit, Source, Status, Team};
use App\Traits\{GetEmployeeSalesTrait, LeadHelperMethodsTrait};

#[Title('Lead Operation')]
class LeadOperation extends Component
{
    use GetEmployeeSalesTrait, LeadHelperMethodsTrait;
    public $id, $type;
    public LeadOperationsForm $lead;

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
            'sections' => $this->sections(),
            'priorities' => $this->priorities(),
            'types' => LeadType::get(['id', 'name']),
            'units' => LeadUnit::get(['id', 'name']),
            'countries' => Country::get(['id', 'name']),
            'statuses' => Status::get(['id', 'name']),
            'sources' => Source::get(['id', 'name']),
            'teams' => Team::get(['id', 'name']),
            'employees' => $this->employees($this->lead->team_id),
        ]);
    }
}
