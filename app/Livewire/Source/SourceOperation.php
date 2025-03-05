<?php

namespace App\Livewire\Source;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\SourceOperationsForm;

#[Title('Source Operation')]
class SourceOperation extends Component
{
    public SourceOperationsForm $sourceForm;
    public $id, $type;

    /**
     * Saves a new source and redirects to the source index page.
     */
    public function save()
    {
        $this->sourceForm->store();
        $this->redirect(route('source.index', absolute: true));
    }

    /**
     * Updates the source and redirects to the source index page.
     */
    public function update()
    {
        $this->sourceForm->update();
        $this->redirect(route('source.index', absolute: true));
    }

    /**
     * Renders the source operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->sourceForm->get($this->id);
        }
        return view('livewire.source.source-operation', [
            'types' => $this->type,
        ]);
    }
}
