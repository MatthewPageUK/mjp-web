<x-cms-layout
    title="CMS"
>

            <div class="grid sm:grid-cols-12 gap-8">

                @for ($x = 0; $x < 7; $x++)
                <div class="sm:col-span-6 lg:col-span-3 border">
                    <h2 class="px-8 py-4 bg-zinc-600 text-4xl">Skills</h2>
                    <div class="p-8 pt-4">
                        <p>25 skills</p>
                        <p>Add Skill</p>
                        <p>List skills</p>
                        <p>Manage Groups</p>
                    </div>
                </div>
                @endfor


            </div>


            <div class="border mt-16">
                <h2 class="px-8 py-4 bg-zinc-600 text-4xl flex items-center shadow-lg">
                    <span class="flex-1">Skills</span>
                    <span class="material-icons-outlined">close_fullscreen</span>
                </h2>

                <div class="p-8 pt-4">
                    <h3 class="text-2xl border-b mb-8 pb-4">Add a skill</h3>
                    form
                </div>
            </div>

</x-cms-layout>
