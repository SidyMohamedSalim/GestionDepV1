  <th wire:click="setOrderField('{{ $fieldname }}')" scope="col" @class('px-6 py-3 cursor-pointer', [
      $fieldname == $selectedFieldName => 'font-extrabold text-white',
  ])>
      <span class="flex items-center gap-2">
          {{ $slot }}
          @if ($fieldname == $selectedFieldName)
              @if ($orderDirection == 'ASC')
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-arrow-down-a-z">
                      <path d="m3 16 4 4 4-4" />
                      <path d="M7 20V4" />
                      <path d="M20 8h-5" />
                      <path d="M15 10V6.5a2.5 2.5 0 0 1 5 0V10" />
                      <path d="M15 14h5l-5 6h5" />
                  </svg>
              @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-arrow-down-z-a">
                      <path d="m3 16 4 4 4-4" />
                      <path d="M7 4v16" />
                      <path d="M15 4h5l-5 6h5" />
                      <path d="M15 20v-3.5a2.5 2.5 0 0 1 5 0V20" />
                      <path d="M20 18h-5" />
                  </svg>
              @endif
          @endif
      </span>
  </th>
