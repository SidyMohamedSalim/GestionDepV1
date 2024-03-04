<div x-data="{ 'showModal': false , focusables() {
        // All focusable element types...
        let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
        return [...$el.querySelectorAll(selector)]
            // All non-disabled elements...
            .filter(el => !el.hasAttribute('disabled'))
    },
    firstFocusable() { return this.focusables()[0] },
    lastFocusable() { return this.focusables().slice(-1)[0] },
    nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
    prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
    nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
    prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },}"
    @keydown.escape="showModal = false" x-on:open-modal.window="$event.detail == '{{ $name }}' ? showModal=true : null"
    x-on:close-modal.window="$event.detail == '{{ $name  }}' ? showModal=false : null"
    x-on:close.stop="showModal = false" x-on:keydown.escape.window="showModal = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()">
    <!-- Trigger for Modal -->

    @yield("btn")
    <button type="button" @click="showModal = true">{{ $icon }}</button>

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal">
        <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="flex items-start justify-between">
                <h5 class="mr-3 font-extrabold text-black max-w-none">{{ $title }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <div>{{ $slot }}</div>
        </div>
    </div>
</div>