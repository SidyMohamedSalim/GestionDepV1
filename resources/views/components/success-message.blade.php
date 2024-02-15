<div>
    @if (session('success'))
        <div class="flex items-center justify-between w-full p-2 px-4 my-4 font-bold rounded-lg bg-primary text-success">
            <span>{{ session('success') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </div>
    @endif

</div>
