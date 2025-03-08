<?php

namespace App\Livewire\Forms;

use App\Interfaces\InteractiveRepositoryInterface;
use Livewire\Form;

class InteractiveOperationForm extends Form
{
    protected $interactiveRepository;
    public $id, $lead_id, $title, $content, $type, $status_id;

    public function boot(InteractiveRepositoryInterface $interactiveRepository)
    {
        $this->interactiveRepository = $interactiveRepository;
    }

    public function rules(): array
    {
        return $this->interactiveRepository->rules();
    }

    /**
     * Get the validation attributes for the form.
     *
     * @return array The mapping of field names to user-friendly labels.
     */
    protected function validationAttributes(): array
    {
        return $this->interactiveRepository->attributes();
    }

    /**
     * Store a new interactive record with validated data.
     *
     * @return void
     */
    public function store()
    {
        $vaildatedData = $this->validate();
        $this->interactiveRepository->store($this->lead_id,  $vaildatedData);
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
        $Interactive = $this->interactiveRepository->get($id);
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
        $this->interactiveRepository->update($this->id, $vaildatedData);
        $this->reset();
    }

    /**
     * Delete an interactive from the database.
     *
     * @return void
     */
    public function destroy()
    {
        $this->interactiveRepository->delete($this->id);
        $this->reset();
    }
}
