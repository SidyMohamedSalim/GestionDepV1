<x-app-layout>



    <div class="max-w-screen-xl mx-auto mt-20">

        <table class="w-full text-sm text-left rtl:text-right ">

            <thead class="text-xs text-white uppercase bg-gray-500 ">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Icons
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        <span>
                            <x-icons.delete />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        Pour supprimer l'element
                    </td>
                </tr>
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        {{-- show --}}
                        <span>
                            <x-icons.eyes />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        Voir les details de l'element
                    </td>
                </tr>

                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        {{-- edit --}}
                        <span class="font-medium text-primary dark:text-primary hover:underline">
                            <x-icons.edit />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        modifier l'element
                    </td>
                </tr>

                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        {{-- affectation enseignants --}}
                        <span x-data="" class="text-success">
                            <x-icons.users />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        ajouters des personnes (enseignants) dans cet element
                    </td>
                </tr>
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        <span>
                            <x-icons.utils />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        ajouter de materiel pour cet element
                    </td>
                </tr>
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        <span>
                            <x-icons.desktop />
                        </span>
                    </th>
                    <td class="px-6 py-4">
                        affecter un enseignant à un local
                    </td>
                </tr>


            </tbody>
        </table>

    </div>

</x-app-layout>
