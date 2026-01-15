<?php

namespace App\Livewire;

use App\Enums\DeveloperStatus;
use App\Models\Developer;
use App\Models\JobTitle;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class DeveloperSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $jobTitleIds = [];
    public $skillIds = [];
    public $minExperience = '';
    public $maxExperience = '';
    public $availableOnly = true;

    protected $queryString = [
        'search' => ['except' => ''],
        'jobTitleIds' => ['except' => []],
        'skillIds' => ['except' => []],
        'minExperience' => ['except' => ''],
        'maxExperience' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingJobTitleIds()
    {
        $this->resetPage();
    }

    public function updatingSkillIds()
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
        $this->reset(['search', 'jobTitleIds', 'skillIds', 'minExperience', 'maxExperience', 'availableOnly']);
        $this->resetPage();
    }

    public function render()
    {
        $jobTitles = JobTitle::where('is_active', true)
            ->orderBy('name')
            ->get();

        $skills = Skill::where('is_active', true)
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
            ->when(!empty($this->jobTitleIds), function ($query) {
                $query->whereIn('job_title_id', $this->jobTitleIds);
            })
            ->when(!empty($this->skillIds), function ($query) {
                $query->whereHas('skills', function ($skillQuery) {
                    $skillQuery->whereIn('skills.id', $this->skillIds);
                });
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
            'skills' => $skills,
        ]);
    }
}
