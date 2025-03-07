<?php

namespace App\Livewire\Source;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Interfaces\SourceRepositoryInterface;

#[Title('Source Operation')]
class SourceOperation extends Component
{
    public $id, $type, $name, $description, $website;

    protected $sourceRepository;

    public function boot(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * Saves a new Source and redirects to the Source index page.
     */
    public function save()
    {
        $this->validate($this->rules());
        $this->sourceRepository->store([
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
        ]);
        $this->redirect(route('sources.index', absolute: true));
    }

    /**
     * Updates the Source and redirects to the Source index page.
     */
    public function update()
    {
        $this->validate($this->rules());
        $this->sourceRepository->update($this->id, [
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
        ]);
        $this->redirect(route('sources.index', absolute: true));
    }

    /**
     * Retrieves a source by its ID and populates the form with its attributes.
     *
     * @param int $id The ID of the source to retrieve.
     */
    public function get(int $id): void
    {
        $source =  $this->sourceRepository->get($id);
        $this->name = $source->name;
        $this->description = $source->description;
        $this->website = $source->website;
    }

    /**
     * Retrieves the validation rules for the source attributes.
     *
     * @return array The validation rules for the source attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'website': Optional string that must be a valid URL.
     *               - 'description': Optional string with a maximum length of 2000 characters.
     */
    protected function rules(): array
    {
        return $this->sourceRepository->rules();
    }


    /**
     * Renders the Source operation view and populates the form if ID is provided.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->id) {
            $this->get($this->id);
        }
        return view('livewire.source.source-operation', [
            'types' => $this->type,
        ]);
    }
}
