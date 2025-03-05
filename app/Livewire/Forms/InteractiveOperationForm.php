<?php

namespace App\Livewire\Forms;

use App\Models\Interactive;
use App\Models\Lead;
use Livewire\Form;

class InteractiveOperationForm extends Form
{
    public $id, $lead_id, $title, $content, $type, $status_id;

    protected $rules = [
        'lead_id' => 'required|exists:leads,id',
        'title' => 'required|string|min:3',
        'content' => 'required|string|max:2000',
        'type' => 'required|string',
        'status_id' => 'required|exists:statuses,id',
    ];

    /**
     * Get the validation attributes for the form.
     *
     * @return array The mapping of field names to user-friendly labels.
     */
    protected function validationAttributes()
    {
        return [
            'status_id' => 'status',
            'source_id' => 'source',
            'assigned_id' => 'assigned',
            'group_id' => 'group',
            'country_id' => 'country',
        ];
    }

    /**
     * Store a new interactive record with validated data.
     *
     * @return void
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        Interactive::create(array_merge($vaildatedData, [
            'lead_id' => $this->lead_id,
            'user_id' => auth()->id(),
        ]));
        $this->reset();
    }

    /**
     * Retrieve and populate the form fields with an existing interactive's data.
     *
     * @param int $id The ID of the interactive to retrieve.
     * @return void
     */
    public function get($id)
    {
        $Interactive = Interactive::findOrFail($id);
        $this->id = $Interactive->id;
        $this->title = $Interactive->title;
        $this->content = $Interactive->content;
        $this->type = $Interactive->type;
        $this->status_id = $Interactive->status_id;
    }

    /**
     * Update an existing interactive's details.
     *
     * @return void
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $Interactive = Interactive::findOrFail($this->id);
        $Interactive->update($vaildatedData);
        $this->reset();
    }

    /**
     * Delete an interactive from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $Interactive = Interactive::findOrFail($this->id);
        $Interactive->delete();
        $this->reset();
    }
}
