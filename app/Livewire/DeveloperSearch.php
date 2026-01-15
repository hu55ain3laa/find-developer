<?php

namespace App\Livewire;

use App\Enums\DeveloperStatus;
use App\Models\Developer;
use App\Models\JobTitle;
use Livewire\Component;
use Livewire\WithPagination;

class DeveloperSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $jobTitleId = '';
    public $minExperience = '';
    public $maxExperience = '';
    public $availableOnly = true;

    protected $queryString = [
        'search' => ['except' => ''],
        'jobTitleId' => ['except' => ''],
        'minExperience' => ['except' => ''],
        'maxExperience' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingJobTitleId()
    {
        $this->resetPage();
    }

    public function updatingMinExperience()
    {
        $this->resetPage();
    }

    public function updatingMaxExperience()
    {
        $this->resetPage();
    }

    public function updatingAvailableOnly()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'jobTitleId', 'minExperience', 'maxExperience', 'availableOnly']);
        $this->resetPage();
    }

    public function render()
    {
        $jobTitles = JobTitle::where('is_active', true)
            ->orderBy('name')
            ->get();

        $developers = Developer::query()
            ->with(['jobTitle', 'skills'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('location', 'like', '%' . $this->search . '%')
                        ->orWhereHas('skills', function ($skillQuery) {
                            $skillQuery->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->jobTitleId, function ($query) {
                $query->where('job_title_id', $this->jobTitleId);
            })
            ->when($this->minExperience !== '', function ($query) {
                $query->where('years_of_experience', '>=', $this->minExperience);
            })
            ->when($this->maxExperience !== '', function ($query) {
                $query->where('years_of_experience', '<=', $this->maxExperience);
            })
            ->when($this->availableOnly, function ($query) {
                $query->where('is_available', true);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('livewire.developer-search', [
            'developers' => $developers,
            'jobTitles' => $jobTitles,
        ]);
    }
}
