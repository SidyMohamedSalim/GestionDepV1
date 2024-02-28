<div>
    <li>
        <input type="radio" id="{{ $id }}-small" name="{{ $name }}" value="{{ $id }}" class="hidden peer" required />
        <label for="{{ $id }}-small"
            class="inline-flex items-center justify-between w-full p-2 px-6 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary peer-checked:border-primary peer-checked:text-primary hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="block">
                <div class="w-full text-lg font-semibold">{{ $title }}</div>
                <div class="w-full"></div>
            </div>
            <div class="">{{ $slot }}</div>
        </label>
    </li>
</div>