<x-filament-panels::page.simple>
    @if($recommendedDeveloper)
        <div style="margin-bottom: 1.5rem; padding: 1rem; background: rgba(59, 130, 246, 0.1); border-radius: 0.5rem; border: 1px solid rgba(59, 130, 246, 0.3);">
            <p style="margin: 0; color: var(--text-secondary); font-size: 0.875rem;">
                <strong>Recommending:</strong> {{ $recommendedDeveloper->name }} - {{ $recommendedDeveloper->jobTitle->name }}
            </p>
        </div>
    @endif
    
    <form wire:submit="submit">
        {{ $this->form }}

        {{ $this->getSubmitAction() }}
    </form>

</x-filament-panels::page.simple>
