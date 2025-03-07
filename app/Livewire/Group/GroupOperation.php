<?php

namespace App\Livewire\Group;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\GroupRepositoryInterface;

#[Title('Group Operation')]
class GroupOperation extends Component
{
    public $id, $type, $name, $description, $website;

    protected $groupRepository;

    public function boot(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Saves a new Group and redirects to the Group index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->groupRepository->store([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->redirect(route('groups.index', absolute: true));
    }

    /**
     * Updates the Group and redirects to the Group index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->groupRepository->update($this->id, [
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->redirect(route('groups.index', absolute: true));
    }

    /**
     * Retrieves a group by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the group to retrieve.
     */
    public function get(int $id): void
    {
        $group =  $this->groupRepository->get($id);
        $this->name = $group->name;
        $this->description = $group->description;
    }

    /**
     * Retrieves the validation rules for the group attributes.
     *
     * @return array The validation rules for the group attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'description': Optional string with a maximum length of 2000 characters.
     */
    protected function rules(): array
    {
        return $this->groupRepository->rules();
    }


    /**
     * Renders the Group operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.group.group-operation', [
            'types' => $this->type,
        ]);
    }
}
