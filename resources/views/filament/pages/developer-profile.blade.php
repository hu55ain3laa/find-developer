<x-filament-panels::page>
    @php
        $subscriptionPlan = $this->getSubscriptionPlan();
        $config = $this->getSubscriptionPlanConfig();
    @endphp

    <div class="p-4 rounded-xl border {{ $config['border'] }} {{ $config['bg'] }}">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                @if($subscriptionPlan->getIcon())
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ $config['badge'] }}">
                        <x-filament::icon 
                            :icon="$subscriptionPlan->getIcon()" 
                            class="w-5 h-5"
                        />
                    </div>
                @endif
                <div>
                    <p class="text-sm font-medium {{ $config['text'] }} opacity-70">Current Plan</p>
                    <p class="text-lg font-bold {{ $config['text'] }}">{{ $subscriptionPlan->getLabel() }} Plan</p>
                </div>
            </div>
            <div class="px-3 py-1.5 rounded-md {{ $config['badge'] }} text-sm font-semibold">
                Active
            </div>
        </div>
    </div>

    <form wire:submit="save">
        {{ $this->form }}

        {{ $this->getSaveAction() }}
    </form>
</x-filament-panels::page>
