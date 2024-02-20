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

        <a href="{{ route('materiel.equipement.index') }}"
            class="p-2.5 mt-3 flex items-center @if (Str::contains($routeName, 'materiel.')) bg-primary text-white @endif rounded-md px-4 duration-300 cursor-pointer hover:bg-primary ">
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
            <span class="text-[15px] ml-4 font-bold">Materiels</span>
        </a>

    </div>
    <div class="mt-[300%]">
        <div class="my-4 bg-black h-[1px]"></div>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-primary text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-danger font-bold">Deconnexion</span>
        </div>
    </div>
</div>
