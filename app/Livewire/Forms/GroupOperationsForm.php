<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Group;


class GroupOperationsForm extends Form
{
    public $id, $name, $description;

    protected $rules = [
        'name' => 'required|string|min:3',
        'description' => 'nullable|string|max:2000',
    ];

    /**
     * Store a new group in the database.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        Group::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset();
    }

    /**
     * Retrieve and populate form fields with an existing group's data.
     *
     * @param int $id The ID of the group to retrieve.
     * @return void
     */
    public function get($id)
    {
        $group = Group::findOrFail($id);
        $this->id = $group->id;
        $this->name = $group->name;
        $this->description = $group->description;
    }

    /**
     * Update an existing group's details.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $group = Group::findOrFail($this->id);
        $group->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset();
    }

    /**
     * Delete a group from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $group = Group::findOrFail($this->id);
        $group->delete();
        $this->reset();
    }
}
