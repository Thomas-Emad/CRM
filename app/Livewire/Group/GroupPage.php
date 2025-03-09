<?php

namespace App\Livewire\Group;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\GroupRepositoryInterface;

#[Title('Groups')]
class GroupPage extends Component
{
    public $search = '';
    protected $groupRepository;

    public function boot(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Deletes the current group and closes the delete modal.
     */
    public function delete($id)
    {
        $this->groupRepository->delete($id);
        $this->redirect(route('groups.index'));
    }

    /**
     * Renders the group page with paginated groups filtered by the search query.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.group.group-page', [
            'groups' => $this->groupRepository->all($this->search),
        ]);
    }
}
