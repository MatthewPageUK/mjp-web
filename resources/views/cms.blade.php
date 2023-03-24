<x-cms-layout
    title="CMS"
>

            <div class="grid sm:grid-cols-12 gap-8">

                <livewire:skill.cms.dashboard.widget />

                <div class="sm:col-span-6 lg:col-span-3 border hover:shadow-lg hover:bg-zinc-900">
                    <h2 class="flex items-center px-8 py-4 bg-zinc-600 text-4xl">
                        <span class="flex-1">Demos</span>
                        <span class="border rounded-xl p-2 text-lg">6</span>
                    </h2>
                    <ul class="p-8 py-4">
                        <li class="hover:text-emerald-500 underline">Add Demo</li>
                    </ul>
                    <p class="p-8 py-4">
                    <select class="bg-zinc-800 w-full">
                        <option>Choose a demo</option>
                    </select>
                    </p>
                </div>



                @for ($x = 0; $x < 7; $x++)
                <div class="sm:col-span-6 lg:col-span-3 border opacity-20">
                    <h2 class="px-8 py-4 bg-zinc-600 text-4xl">&nbsp; </h2>
                    <div class="p-8 pt-4">
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
                @endfor


            </div>

</x-cms-layout>
