<?php

namespace App\Livewire\Group;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GroupOperationsForm;


#[Title('Group Operation')]
class GroupOperation extends Component
{
    public GroupOperationsForm $groupForm;
    public $id, $type;

    /**
     * Saves a new group and redirects to the group index page.
     */
    public function save()
    {
        $this->groupForm->store();
        $this->redirect(route('group.index', absolute: true));
    }

    /**
     * Updates the group and redirects to the group index page.
     */
    public function update()
    {
        $this->groupForm->update();
        $this->redirect(route('group.index', absolute: true));
    }

    /**
     * Renders the group operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->groupForm->get($this->id);
        }
        return view('livewire.group.group-operation', [
            'types' => $this->type,
        ]);
    }
}
