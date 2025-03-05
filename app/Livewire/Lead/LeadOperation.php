<?php

namespace App\Livewire\Lead;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\LeadOperationsForm;
use App\Models\Country;
use App\Models\Group;
use App\Models\Source;
use App\Models\Status;
use App\Models\User;

#[Title('Lead Operation')]
class LeadOperation extends Component
{
    public LeadOperationsForm $lead;
    public $id, $type;

    /**
     * Save a new lead and redirect to the lead index page.
     *
     * @return void
     */
    public function save()
    {
        $this->lead->store();
        $this->redirect(route('lead.index', absolute: true));
    }

    /**
     * Update an existing lead and redirect to the lead index page.
     *
     * @return void
     */
    public function update()
    {
        $this->lead->update();
        $this->redirect(route('lead.index', absolute: true));
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
