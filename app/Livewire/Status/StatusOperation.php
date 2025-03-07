<?php

namespace App\Livewire\Status;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\StatusRepositoryInterface;

#[Title('Status Operation')]
class StatusOperation extends Component
{
    public $id, $type, $name, $color;

    protected $statusRepository;

    public function boot(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Saves a new Status and redirects to the Status index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->statusRepository->store([
            'name' => $this->name,
            'color' => $this->color,
        ]);
        $this->redirect(route('statuses.index', absolute: true));
    }

    /**
     * Updates the Status and redirects to the Status index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->statusRepository->update($this->id, [
            'name' => $this->name,
            'color' => $this->color,
        ]);
        $this->redirect(route('statuses.index', absolute: true));
    }

    /**
     * Retrieves a status by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the status to retrieve.
     */
    public function get(int $id): void
    {
        $status =  $this->statusRepository->get($id);
        $this->name = $status->name;
        $this->color = $status->color;
    }

    /**
     * Retrieves the validation rules for the status attributes.
     *
     * @return array The validation rules for the status attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'color': Required string matching a hexadecimal color code pattern.
     */
    protected function rules(): array
    {
        return $this->statusRepository->rules();
    }


    /**
     * Renders the Status operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.status.status-operation', [
            'types' => $this->type,
        ]);
    }
}
