<?php

namespace App\Livewire\Status;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\StatusOperationsForm;

#[Title('Status Operation')]
class StatusOperation extends Component
{
    public StatusOperationsForm $statusForm;
    public $id, $type;

    /**
     * Saves a new Status and redirects to the Status index page.
     */
    public function save()
    {
        $this->statusForm->store();
        $this->redirect(route('status.index', absolute: true));
    }

    /**
     * Updates the Status and redirects to the Status index page.
     */
    public function update()
    {
        $this->statusForm->update();
        $this->redirect(route('status.index', absolute: true));
    }

    /**
     * Renders the Status operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->statusForm->get($this->id);
        }
        return view('livewire.status.status-operation', [
            'types' => $this->type,
        ]);
    }
}
