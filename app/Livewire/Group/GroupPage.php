<?php

namespace App\Livewire\Group;

use App\Interfaces\GroupRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Groups')]
class GroupPage extends Component
{
    use WithPagination;

    public $search = '';
    public $groupId, $groupName, $description;

    protected $groupRepository;

    public function boot(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Displays the group form for the given ID.
     *
     * @param int $id
     */
    public function show($id)
    {
        $group = $this->groupRepository->get($id);
        $this->groupId = $group->id;
        $this->groupName = $group->name;
    }

    /**
     * Deletes the current group and closes the delete modal.
     */
    public function delete()
    {
        $this->groupRepository->delete($this->groupId);
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
