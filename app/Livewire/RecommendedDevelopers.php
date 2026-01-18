<?php

namespace App\Livewire;

use App\Models\Developer;
use App\Models\Scopes\DeveloperScope;
use Livewire\Component;
use Livewire\WithPagination;

class RecommendedDevelopers extends Component
{
    use WithPagination;

    public function render()
    {
        $developers = Developer::with(['jobTitle', 'skills'])
            ->with(['projects' => function ($query) {
                $query->withoutGlobalScopes([DeveloperScope::class])->limit(6)->orderBy('created_at', 'desc');
            }])
            ->withCount(['projects' => function ($query) {
                $query->withoutGlobalScopes([DeveloperScope::class]);
            }])
            ->recommended()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.recommended-developers', [
            'developers' => $developers,
        ]);
    }
}
