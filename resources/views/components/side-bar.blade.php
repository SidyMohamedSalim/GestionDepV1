<div
    class="hidden sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto text-center bg-white 2xl:flex flex-col ">

    <div>
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
        </a>

        <a href="{{ route('dashboard') }}"
            class="p-2.5 mt-3 flex items-center @if (request()->routeIs('dashboard')) bg-primary text-white @endif rounded-md px-4 duration-300 cursor-pointer hover:bg-primary ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-layout-dashboard">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </svg>
            <span class="text-[15px] ml-4  font-bold">Tableau de Bord</span>
        </a>

        @php
        $routeName = Route::currentRouteName();
        @endphp

        <a href="{{ route('enseignant.index') }}"
            class="p-2.5 mt-3 flex items-center @if (Str::contains($routeName, 'enseignant.') || Str::contains($routeName, 'vacataire.')) bg-primary text-white @endif rounded-md px-4 duration-300 cursor-pointer hover:bg-primary ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-users-round">
                <path d="M18 21a8 8 0 0 0-16 0" />
                <circle cx="10" cy="8" r="5" />
                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
            </svg>
            <span class="text-[15px] ml-4  font-bold">Enseignants</span>
        </a>

        <a href="{{ route('bureau.index') }}"
            class="p-2.5 mt-3 flex items-center @if (Str::contains($routeName, 'bureau.')) bg-primary text-white @endif rounded-md px-4 duration-300 cursor-pointer hover:bg-primary ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-monitor-dot">
                <circle cx="19" cy="6" r="3" />
                <path d="M22 12v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9" />
                <path d="M12 17v4" />
                <path d="M8 21h8" />
            </svg>
            <span class="text-[15px] ml-4 font-bold">Bureaux</span>
        </a>


        <div class="flex flex-col items-center justify-start w-full ">
            <div onclick="showMenu1(true)"
                class="justify-between w-full text-left focus:outline-none focus:text-indigo-400 space-x-14 p-4 mt-3 flex items-center @if (Str::contains($routeName, 'materiel.')) bg-primary text-white @endif rounded-md  duration-300 cursor-pointer hover:bg-primary ">
                <p class="text-[15px]  font-bold flex justify-start gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-cog">
                        <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                        <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                        <path d="M12 2v2" />
                        <path d="M12 22v-2" />
                        <path d="m17 20.66-1-1.73" />
                        <path d="M11 10.27 7 3.34" />
                        <path d="m20.66 17-1.73-1" />
                        <path d="m3.34 7 1.73 1" />
                        <path d="M14 12h8" />
                        <path d="M2 12h2" />
                        <path d="m20.66 7-1.73 1" />
                        <path d="m3.34 17 1.73-1" />
                        <path d="m17 3.34-1 1.73" />
                        <path d="m11 13.73-4 6.93" />
                    </svg>
                    <span>Materiels</span>
                </p>
                <svg id="icon1" class="transform" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div id="menu1" class="flex flex-col items-start justify-start w-full gap-4 px-2 pb-1 mt-3 md:w-auto ">
                <a href="{{ route('materiel.materiel.index') }}"
                    class="flex items-center justify-start w-full px-3 py-2 space-x-6 text-gray-400 rounded cursor-pointer hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 md:w-52 @if (Str::contains($routeName, 'materiel.materiel.')) bg-gray-700 text-white @endif">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 8.00002C15.1046 8.00002 16 7.10459 16 6.00002C16 4.89545 15.1046 4.00002 14 4.00002C12.8954 4.00002 12 4.89545 12 6.00002C12 7.10459 12.8954 8.00002 14 8.00002Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 6H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M16 6H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M8 14C9.10457 14 10 13.1046 10 12C10 10.8954 9.10457 10 8 10C6.89543 10 6 10.8954 6 12C6 13.1046 6.89543 14 8 14Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 12H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 12H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M17 20C18.1046 20 19 19.1046 19 18C19 16.8955 18.1046 16 17 16C15.8954 16 15 16.8955 15 18C15 19.1046 15.8954 20 17 20Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 18H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M19 18H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="text-base leading-4 ">Admin Materiels</p>
                </a>
                <a href="{{ route('materiel.materiel_acquisition.index') }}"
                    class="flex items-center justify-start w-full px-3 py-2 space-x-6 text-gray-400 rounded cursor-pointer hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 md:w-52 @if(Str::contains($routeName, 'materiel.materiel_acquisition')) bg-gray-700 text-white @endif">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 19C10.2091 19 12 17.2091 12 15C12 12.7909 10.2091 11 8 11C5.79086 11 4 12.7909 4 15C4 17.2091 5.79086 19 8 19Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.85 12.15L19 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M18 5L20 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15 8L17 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="text-base leading-4 ">Acquisitions</p>
                </a>
                <a
                    class="flex items-center justify-start w-full px-3 py-2 space-x-6 text-gray-400 rounded cursor-pointer hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 md:w-52">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 21H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 21V3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M10 4L19 8L10 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="text-base leading-4 ">Archives</p>
                </a>
            </div>
        </div>

    </div>

    <script>
        let icon1 = document.getElementById("icon1");
let menu1 = document.getElementById("menu1");
const showMenu1 = (flag) => {
if (flag) {
icon1.classList.toggle("rotate-180");
menu1.classList.toggle("hidden");
}
};

    </script>

</div>