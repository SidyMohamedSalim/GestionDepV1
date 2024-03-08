@unless ($breadcrumbs->isEmpty())
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
        <li class="inline-flex items-center">
            <a href="{{ $breadcrumb->url }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white">
                {{ $breadcrumb->title }}
                <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>

            </a>
        </li>
        @else
        <li aria-current="page">
            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">{{ $breadcrumb->title
                    }}</span>
            </div>
        </li>
        @endif
        @endforeach
    </ol>
</nav>
@endunless