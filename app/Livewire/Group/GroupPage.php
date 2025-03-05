<?php

namespace App\Livewire\Group;

use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GroupOperationsForm;

#[Title('Groups')]
class GroupPage extends Component
{
    public GroupOperationsForm $groupForm;

    use WithPagination;

    public $search = '';

    /**
     * Displays the group details for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $this->groupForm->get($id);
    }

    /**
     * Deletes the group and closes the delete modal.
     */
    public function delete()
    {
        $this->groupForm->destroy();
        $this->redirect(route('group.index'));
    }

    /**
     * Renders the group page with a paginated list of groups filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.group.group-page', [
            'groups' => group::select(['id', 'name', 'description'])->where('name', 'like', "%$this->search%")->paginate(10),
        ]);
    }
}
