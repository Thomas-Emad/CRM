<?php

namespace App\Livewire\Lead;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\LeadOperationsForm;
use App\Models\{User, Country, Group, Source, Status};

#[Title('Lead Operation')]
class LeadOperation extends Component
{
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
        $this->redirect(route('leads.index', absolute: true));
    }

    /**
     * Update an existing lead and redirect to the lead index page.
     *
     * @return void
     */
    public function update()
    {
        $this->lead->update();
        $this->redirect(route('leads.index', absolute: true));
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
            'users' => User::get(['id', 'name']),
        ]);
    }
}
