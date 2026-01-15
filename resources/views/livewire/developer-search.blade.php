<div class="container">
    <!-- Header -->
    <div class="page-header">
        <h1 class="page-title">Find Your Perfect Developer</h1>
        <p class="page-subtitle">Search from our pool of talented developers</p>
    </div>

    <!-- Floating Search Button -->
    <div x-data="{ isOpen: false }" class="search-container">
        <!-- Floating Button -->
        <button 
            @click="isOpen = true"
            x-show="!isOpen"
            x-transition
            class="search-floating-btn"
            type="button"
            aria-label="Open search filters"
        >
            <svg class="search-btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span class="search-btn-text">Filters</span>
        </button>

        <!-- Slide-in Search Panel with Backdrop -->
        <div 
            x-show="isOpen"
            x-cloak
            @click.away="isOpen = false"
            @keydown.escape.window="isOpen = false"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-full opacity-0"
            class="search-slide-panel"
        >
            <div class="search-card" @click.stop>
                <!-- Header with Close Button -->
                <div class="search-card-header">
                    <h3 class="search-card-title">Search & Filters</h3>
                    <button 
                        @click="isOpen = false"
                        class="search-close-btn"
                        type="button"
                        aria-label="Close search filters"
                    >
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Form -->
                <form wire:submit="search">
                    {{ $this->form }}
                </form>

                <!-- Footer -->
                <div class="search-footer">
                    <button 
                        type="button"
                        wire:click="clearFilters"
                        class="btn-link"
                    >
                        Clear all filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Count -->
    <div class="results-count">
        Found <span class="results-count-number">{{ $totalCount }}</span> developer(s)
    </div>

    <!-- Loading Indicator -->
    <div wire:loading class="loading-indicator">
        Loading...
    </div>

    <!-- Premium Developers Section -->
    @if($premiumDevelopers->count() > 0)
        <div class="section-header">
            <h2 class="section-title">
                <svg class="section-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                Premium Developers
            </h2>
            <p class="section-subtitle">Featured developers with premium profiles</p>
        </div>
        <div class="developers-grid">
            @foreach($premiumDevelopers as $developer)
                <x-developer-card :developer="$developer" />
            @endforeach
        </div>
    @endif

    <!-- Pro Developers Section -->
    @if($proDevelopers->count() > 0)
        <div class="section-header">
            <h2 class="section-title">
                <svg class="section-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                Pro Developers
            </h2>
            <p class="section-subtitle">Featured developers with pro profiles</p>
        </div>
        <div class="developers-grid">
            @foreach($proDevelopers as $developer)
                <x-developer-card :developer="$developer" />
            @endforeach
        </div>
    @endif

    <!-- Free Developers Section -->
    @if($freeDevelopers->count() > 0)
        <div class="section-header">
            <h2 class="section-title">
                <svg class="section-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                All Developers
            </h2>
            <p class="section-subtitle">Browse all registered developers</p>
        </div>
        <div class="developers-grid">
            @foreach($freeDevelopers as $developer)
                <x-developer-card :developer="$developer" />
            @endforeach
        </div>

        <!-- Pagination (only for free developers) -->
        <div class="pagination-container">
            {{ $freeDevelopers->links() }}
        </div>
    @endif

    <!-- Empty State -->
    @if($totalCount == 0)
        <div class="empty-state">
            <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <h3 class="empty-title">No developers found</h3>
            <p class="empty-text">Try adjusting your search criteria or clearing filters.</p>
        </div>
    @endif
</div>
