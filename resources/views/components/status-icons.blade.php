<div>
    @if ($active)
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-check text-success">
            <path d="M20 6 9 17l-5-5" />
        </svg>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-x text-danger">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    @endif
</div>
