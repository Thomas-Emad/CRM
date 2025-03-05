<?php

namespace App\Livewire\Lead\Interactive;

use Livewire\Component;
use App\Livewire\Forms\InteractiveOperationForm;
use App\Models\Status;

class InteractiveOperation extends Component
{

    public InteractiveOperationForm $interactiveForm;
    public $id, $type, $interactive;


    /**
     * Displays the lead details for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->interactiveForm->get($id);
    }

    /**
     * Save a new interactive form for a lead and redirect to the lead show page.
     *
     * @return void
     */
    public function save()
    {
        $this->interactiveForm->lead_id = $this->id;
        $this->interactiveForm->store();
        $this->redirect(route('lead.show', ['id' => $this->id], absolute: true));
    }

    /**
     * Update an existing interactive form for a lead and redirect to the lead show page.
     *
     * @return void
     */
    public function update()
    {
        $this->interactiveForm->lead_id = $this->id;

        $this->interactiveForm->update();
        $this->redirect(route('lead.show', ['id' => $this->id], absolute: true));
    }

    public function render()
    {
        if ($this->interactive) {
            $this->interactiveForm->get($this->id);
        }
        return view('livewire.lead.interactive.interactive-operation', [
            'statuses' => Status::get(['id', 'name']),

        ]);
    }
}
