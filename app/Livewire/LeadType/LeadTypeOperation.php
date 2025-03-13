<?php

namespace App\Livewire\LeadType;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadTypeRepositoryInterface;

#[Title('Lead Unit Operation')]
class LeadTypeOperation extends Component
{
    public $id, $type, $name;

    protected $typeRepository;

    public function boot(LeadTypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Saves a new Lead Type and redirects to the Lead Type index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->typeRepository->store([
            'name' => $this->name,
        ]);
        $this->redirect(route('lead-types.index'), navigate: true);
    }

    /**
     * Updates the Lead Type and redirects to the Lead Type index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->typeRepository->update($this->id, [
            'name' => $this->name,
        ]);
        $this->redirect(route('lead-types.index'), navigate: true);
    }

    /**
     * Retrieves a type by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the type to retrieve.
     */
    public function get(int $id): void
    {
        $type =  $this->typeRepository->get($id);
        $this->name = $type->name;
    }

    /**
     * Retrieves the validation rules for the type attributes.
     *
     * @return array The validation rules for the type attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'description': Optional string with a maximum length of 2000 characters.
     */
    protected function rules(): array
    {
        return $this->typeRepository->rules();
    }

    /**
     * Renders the LeadType operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.lead-type.type-operation', [
            'types' => $this->type,
        ]);
    }
}
