<?php

use App\Models\LauncherGroup;
use Livewire\Component;

new class extends Component
{
    public ?int $editingId = null;
    public string $key = '';
    public string $label = '';
    public ?string $icon = null;
    public int $sortOrder = 0;
    public bool $isActive = true;

    protected function rules(): array
    {
        return [
            'key' => ['required', 'string', 'max:50', 'unique:launcher_groups,key,' . $this->editingId],
            'label' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sortOrder' => ['required', 'integer', 'min:0'],
            'isActive' => ['boolean'],
        ];
    }

    public function render()
    {
        return $this->view([
            'groups' => LauncherGroup::orderBy('sort_order')->get(),
        ])
        ->layout('layouts::app')
        ->title('Launcher Group Manager');
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->editingId) {
            LauncherGroup::findOrFail($this->editingId)->update($validated);
            session()->flash('success', 'Launcher group updated.');
        } else {
            LauncherGroup::create($validated);
            session()->flash('success', 'Launcher group created.');
        }

        $this->resetForm();
    }

    public function edit(LauncherGroup $group): void
    {
        $this->editingId = $group->id;
        $this->key = $group->key;
        $this->label = $group->label;
        $this->icon = $group->icon;
        $this->sortOrder = $group->sort_order;
        $this->isActive = $group->is_active;
    }

    public function delete(LauncherGroup $group): void
    {
        $group->delete();
        session()->flash('success', 'Launcher group deleted.');
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->editingId = null;
        $this->key = '';
        $this->label = '';
        $this->icon = null;
        $this->sortOrder = 0;
        $this->isActive = true;
    }
};
