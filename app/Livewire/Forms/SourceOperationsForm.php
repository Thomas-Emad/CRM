<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Source;


class SourceOperationsForm extends Form
{
    public $id, $name, $website, $description;

    protected $rules = [
        'name' => 'required|string|min:3',
        'website' => 'nullable|string|url',
        'description' => 'nullable|string|max:2000',
    ];

    /**
     * Store a new source record with validated data.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        Source::create([
            'name' => $this->name,
            'website' => $this->website,
            'description' => $this->description,
        ]);

        $this->reset();
    }

    /**
     * Retrieve and populate the form fields with an existing source's data.
     *
     * @param int $id The ID of the source to retrieve.
     * @return void
     */
    public function get($id)
    {
        $source = Source::findOrFail($id);
        $this->id = $source->id;
        $this->name = $source->name;
        $this->description = $source->description;
        $this->website = $source->website;
    }

    /**
     * Update an existing source's details.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $source = Source::findOrFail($this->id);
        $source->update([
            'name' => $this->name,
            'website' => $this->website,
            'description' => $this->description,
        ]);

        $this->reset();
    }

    /**
     * Delete a source from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $source = Source::findOrFail($this->id);
        $source->delete();
        $this->reset();
    }
}
