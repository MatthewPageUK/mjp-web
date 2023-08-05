<x-ui-layout
    :showMasthead="false"
>

    <div class="grid grid-cols-6 lg:grid-cols-12 gap-4 lg:gap-16 lg:mt-16">
        <div class="col-span-6">
            <h1 class="text-4xl lg:text-6xl font-bold font-orbitron">Matthew Page</h1>
            <h1 class="text-xl lg:text-4xl font-bold text-amber-400 mb-8 font-orbitron">PHP / Larevel Backend Developer</h1>
            <p class="mb-4"> I am an experienced freelance PHP and Laravel backend web developer.</p>
            <p class="mb-4"> I have been developing web applications for over 20 years and have worked on a wide range of projects from small bespoke websites to large scale enterprise applications.</p>
            <p class="mb-4"> I am currently available for freelance work and would love to hear from you if you have a project that you would like to discuss.</p>
            <p>Working from the Norfolk, UK area - prefer local clients but can work with anyone, anywhere.</p>
        </div>
        <div class="col-span-6">
            {{-- Bullet Points --}}
            <x-homepage.bullet-points :bullets="$bulletPoints" />
        </div>
    </div>
    <div class="mt-16 lg:grid lg:grid-cols-2 gap-x-16">

        <div>
            <div class="mb-8 pb-8 border-b border-zinc-500">
                <livewire:demo.homepage-widget />
            </div>
            <div class="mb-8 pb-8 border-b border-zinc-500">
                <livewire:project.recent />
            </div>

        </div>

        <div class="mb-8 pb-8 border-b border-zinc-500">
            <livewire:skill.homepage-widget />
        </div>

        <div>

        </div>

    </div>



    <form class="mt-8 bg-amber-400 p-8 rounded shadow-lg">

        <div class="grid grid-cols-2 gap-32">
            <div>

                <div class="flex">
                    <div class="flex-1">
                        <h1 class="text-4xl font-bold text-zinc-800 mb-2">Let's connect...</h1>
                        <p class="text-zinc-700 mb-8">Reach out with your ideas and thoughts and maybe together we can create something awesome.</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 fill-amber-500 text-zinc-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                          </svg>

                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telephone</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company</label>
                    </div>
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </div>



            <div class="relative z-0 w-full mb-6 group">
                <textarea type="email" name="floating_email" id="floating_email"
                    class="h-full block py-2.5 px-0 w-full text-sm text-zinc-800 font-bold bg-transparent border-0 border-b-2 border-gray-800
                    appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-zinc-600 peer" placeholder=" " required ></textarea>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-zinc-800 dark:text-gray-400
                    duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-zinc-600
                    peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
            </div>



            </div>
            <div>



        </div>
    </form>



</x-ui-layout>
