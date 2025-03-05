<?php

namespace App\Livewire\Forms;

use App\Models\Status;
use Livewire\Form;

class StatusOperationsForm extends Form
{
    public $id, $name, $color;

    protected $rules = [
        'name' => 'required|string|min:3',
        'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
    ];

    /**
     * Stores a new status with validated data.
     */
    public function store()
    {
        $this->validate();

        Status::create([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->reset(['name', 'color']);
    }

    /**
     * Retrieves and populates the form with a specific status by ID.
     *
     * @param int $id
     */
    public function get($id)
    {
        $status = Status::findOrFail($id);
        $this->id = $status->id;
        $this->name = $status->name;
        $this->color = $status->color;
    }

    /**
     * Updates the status with the validated data.
     */
    public function update()
    {
        $this->validate();

        $status = Status::findOrFail($this->id);
        $status->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->reset();
    }

    /**
     * Deletes the status by ID.
     */
    public function destory()
    {
        $status = Status::findOrFail($this->id);
        $status->delete();
        $this->reset();
    }
}
