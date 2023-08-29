{{-- Github Repo Panel --}}
<section class="mb-16 pb-8 border-b"  wire:init="loadRepo">

    {{-- Loading message --}}
    <x-ui.github.loading />

    @if ($this->error)
        {{-- Error message --}}
        <x-ui.github.loading-error />
    @else

        {{-- Main Panel --}}
        <div wire:loading.remove>

            {{-- Header --}}
            <x-ui.github.repo-header />

            {{-- Repo Info --}}
            <x-ui.github.repo-info />

            {{-- Issues and Pull Requests --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mt-8">
                <div class="col-span-2">
                    {{-- Issues --}}
                    <x-ui.github.issues :issues="$this->issues" />
                </div>

                <div>
                    {{-- Pull requests --}}
                    <x-ui.github.pull-requests
                        :open-pull-requests="$this->openPullRequests"
                        :closed-pull-requests="$this->closedPullRequests"
                    />
                </div>
            </div>

        </div>
    @endif
</section>
