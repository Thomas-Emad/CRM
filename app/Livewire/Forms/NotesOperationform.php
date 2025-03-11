<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Interfaces\Activities\NoteRepositoryInterface;

class NotesOperationform extends Form
{
    public $id, $content, $lead_id;
    protected $noteRepository;

    public function boot(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    protected function rules()
    {
        return $this->noteRepository->rules();
    }

    /**
     * Stores a new note for a lead.
     *
     * This method validates the form data, creates a new note in the database
     * using the validated data, and then resets the form for the next input.
     *
     * @return void
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        $this->noteRepository->store(array_merge($vaildatedData, [
            'creator_id' => auth()->id(),
        ]));
        $this->reset();
    }

    /**
     * Update method to modify an existing note
     *
     * This method validates the form data, finds the note by its ID, and updates
     * the note's details with the validated data. It then resets the form for the next input.
     */
    public function update()
    {
        $vaildatedData = $this->validate();
        $this->noteRepository->update($this->id, $vaildatedData);
        $this->reset();
    }

    /**
     * Destroy method to delete an existing note
     *
     * This method finds the note by its ID, deletes it from the database, and
     * resets the form after deletion.
     */
    public function destory($id)
    {
        $this->noteRepository->delete($id);
        $this->reset();
    }
}
