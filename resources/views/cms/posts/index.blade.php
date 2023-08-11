<div x-data="{ mode: @entangle('mode') }">

    {{-- Header --}}
    <h1 class="text-4xl flex">
        <span class="flex-1">Posts</span>

        {{-- Add button --}}
        <x-cms.icon-button
            wire:click.prevent="add"
            x-show="mode !== 'create'"
            title="Add Post"
            icon="add_circle" />
    </h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    {{-- Create / Edit form --}}
    <x-cms.form.form
        x-show="mode === 'create' || mode === 'edit'"
        title="{{ ucwords($this->mode) }} Post"
    >
        <div class="grid grid-cols-12 gap-x-8 gap-y-4">

            {{-- Name --}}
            <label class="col-span-3 block mb-2">Name</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="post.name" />
                <x-cms.validation-error field="post.name" />
            </div>

            {{-- Slug --}}
            <label class="col-span-3 block mb-2">Slug</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="post.slug" />
                <x-cms.validation-error field="post.slug" />
            </div>

            {{-- Snippet --}}
            <label class="col-span-3 block mb-2">Snippet</label>
            <div class="col-span-9">
                <x-cms.form.textarea wire:model="post.snippet" class="h-32" />
                <x-cms.validation-error field="post.snippet" />
            </div>

            {{-- Content --}}
            <label class="col-span-3 block mb-2">Content</label>
            <div class="col-span-9">
                <x-cms.form.textarea wire:model="post.content" class="h-96" />
                <x-cms.validation-error field="post.content" />
                <div class="prose prose-primary prose-lg">
                    @markdown($this->post->content ?? '')
                </div>
            </div>

            {{-- Active --}}
            <label class="col-span-3 block mb-2">Active</label>
            <div class="col-span-9">
                <x-cms.form.select wire:model="post.active">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </x-cms.form.select>
                <x-cms.validation-error field="post.active" />
            </div>

            {{-- Create buttons --}}
            @if ($this->mode === 'create')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="create" label="Create" />
                    <x-cms.text-button wire:click.prevent="cancelAdd" label="Cancel" />
                </div>
            @endif

            {{-- Edit buttons --}}
            @if ($this->mode === 'edit')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="save" label="Save" />
                    <x-cms.text-button wire:click.prevent="cancelEdit" label="Cancel" />
                </div>
            @endif


            @if ($this->mode === 'edit')

                {{-- Categories --}}
                <label class="col-span-3 block mb-2">Categories</label>
                <div class="col-span-9">
                    <livewire:cms.post-categoryable :post="$this->post" wire:key="postcategoryable-{{ $this->post->id }}" />
                </div>

                {{-- Skills --}}
                <label class="col-span-3 block mb-2">Skills</label>
                <div class="col-span-9">
                    <livewire:cms.skillable :skillable="$this->post" wire:key="skillabls-{{ $this->post->id }}" />
                </div>

                {{-- Demos --}}
                <label class="col-span-3 block mb-2">Demos</label>
                <div class="col-span-9">
                    <livewire:cms.demoable :demoable="$this->post" wire:key="demoable-{{ $this->post->id }}" />
                </div>

                {{-- Projects --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Projects</label>
                <div class="col-span-12 md:col-span-9">
                    <livewire:cms.projectable :projectable="$this->post" wire:key="projectable-{{ $this->post->id }}" />
                </div>

                {{-- Experiences --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Experience</label>
                <div class="col-span-12 md:col-span-9">
                    <livewire:cms.experienceable :experienceable="$this->post" wire:key="experienceable-{{ $this->post->id }}" />
                </div>

            @endif

        </div>
    </x-cms.form.form>

    {{-- Delete confirmation --}}
    <x-cms.form.form
        x-show="mode === 'delete'"
        title="Delete Post '{{ $this->post->name }}'"
    >
        <div class="grid grid-cols-2 items-center">
            <p>Are you sure you want to delete the Post?</p>
            <div class="text-right">
                <x-cms.text-button wire:click.prevent="delete" label="Delete" />
                <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
            </div>
        </div>
    </x-cms.form.form>

    {{-- Post list --}}
    <ul class="mt-16">

        @forelse ($this->posts as $post)
            <li class="group flex gap-4 mb-2 border-b pb-2 items-center" wire:key="post-{{ $post->id }}">

                {{-- Colour --}}
                <span class="{{ $post->active ? 'bg-secondary-400' : 'bg-primary-400' }} block w-4 h-4 rounded-full group-hover:rounded-sm transition-all"></span>

                {{-- Name --}}
                <div class="flex-1">
                    <span class="block text-2xl">{{ $post->name }}</span>
                    <span class="text-sm">{{ $post->skills->implode('name', ', ') }}</span>
                </div>

                {{-- Buttons --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $post->id }})" title="Edit" />
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $post->id }})" title="Delete" />

            </li>
        @empty
            {{-- No posts - open the add form on render --}}
            <li class="text-2xl" wire:init="add">No posts found.</li>
        @endforelse

    </ul>

    <script>
        var textareas = document.getElementsByTagName('textarea');
        var count = textareas.length;
        for(var i=0;i<count;i++){
            textareas[i].onkeydown = function(e){
                if(e.keyCode==9 || e.which==9){
                    e.preventDefault();
                    var s = this.selectionStart;
                    this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
                    this.selectionEnd = s+1;
                }
            }
        }
    </script>
</div>
