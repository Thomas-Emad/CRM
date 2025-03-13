<?php

namespace App\Livewire\LeadUnit;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\LeadUnitRepositoryInterface;

#[Title('Lead Unit Operation')]
class LeadUnitOperation extends Component
{
    public $id, $type, $name;

    protected $unitRepository;

    public function boot(LeadUnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    /**
     * Saves a new LeadUnit and redirects to the LeadUnit index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->unitRepository->store([
            'name' => $this->name,
        ]);
        $this->redirect(route('lead-units.index'), navigate: true);
    }

    /**
     * Updates the LeadUnit and redirects to the LeadUnit index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->unitRepository->update($this->id, [
            'name' => $this->name,
        ]);
        $this->redirect(route('lead-units.index'), navigate: true);
    }

    /**
     * Retrieves a unit by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the unit to retrieve.
     */
    public function get(int $id): void
    {
        $unit =  $this->unitRepository->get($id);
        $this->name = $unit->name;
    }

    /**
     * Retrieves the validation rules for the unit attributes.
     *
     * @return array The validation rules for the unit attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'description': Optional string with a maximum length of 2000 characters.
     */
    protected function rules(): array
    {
        return $this->unitRepository->rules();
    }

    /**
     * Renders the LeadUnit operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.lead-unit.unit-operation', [
            'types' => $this->type,
        ]);
    }
}
