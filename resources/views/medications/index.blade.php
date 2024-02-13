

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <x-section :doctor="$doctor"></x-section>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
    <div class="relative overflow-x-auto">
        <div class="mb-4 flex justify-end">
            <button data-modal-target="add-medication-modal" data-modal-toggle="add-medication-modal" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">Add New Medication</button>
        </div>
        <table class="w-full max-w-7xl mt-10 mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Medication Name</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Dosage</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medications as $medication)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $medication->name }}</td>
                        <td class="px-6 py-4">{{ $medication->description }}</td>
                        <td class="px-6 py-4">{{ $medication->dosage }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button data-modal-target="edit-modal-{{ $medication->id }}" data-modal-toggle="edit-modal-{{ $medication->id }}" class="bg-blue-500 text-white px-2 py-1 rounded-md text-sm">Edit</button>
                                <form action="{{ route('medications.destroy', ['medication' => $medication->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this medication?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md text-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <!-- Edit Modal for each medication -->
                    <tr id="edit-modal-{{ $medication->id }}" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center">
                        <td colspan="4">
                            <div class="max-w-md mx-auto mt-8 bg-white p-8 rounded-md shadow-md">
                                <h2 class="text-2xl font-bold mb-4">Edit Medication</h2>
                                <form action="{{ route('medications.update', ['medication' => $medication->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-semibold text-gray-700">Name:</label>
                                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500" value="{{ $medication->name }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="block text-sm font-semibold text-gray-700">Description:</label>
                                        <textarea name="description" id="description" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500">{{ $medication->description }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="dosage" class="block text-sm font-semibold text-gray-700">Dosage:</label>
                                        <input type="text" name="dosage" id="dosage" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500" value="{{ $medication->dosage }}">
                                    </div>
                                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Medication</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
            
        </table>
        <div id="add-medication-modal" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="max-w-md mx-auto mt-8 bg-white p-8 rounded-md shadow-md">
                <h2 class="text-2xl font-bold mb-4">Add New Medication</h2>
                <form action="{{ route('medications.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="new-medication-name" class="block text-sm font-semibold text-gray-700">Name:</label>
                        <input type="text" name="name" id="new-medication-name" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="new-medication-description" class="block text-sm font-semibold text-gray-700">Description:</label>
                        <textarea name="description" id="new-medication-description" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="new-medication-dosage" class="block text-sm font-semibold text-gray-700">Dosage:</label>
                        <input type="text" name="dosage" id="new-medication-dosage" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="illness_id" class="block text-sm font-semibold text-gray-700">Select Illness:</label>
                        <select name="illness_id" id="illness_id" class="w-full border-gray-300 rounded-md mt-1 focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">Select Illness</option>
                            @foreach($illnesses as $illness)
                                <option value="{{ $illness->id }}">{{ $illness->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Add Medication</button>
                </form>
                <button data-modal-hide="add-medication-modal" class="mt-4 w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Cancel</button>
            </div>
        </div>
        
        
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalToggles = document.querySelectorAll("[data-modal-toggle]");
            const modalCloses = document.querySelectorAll("[data-modal-hide]");

            modalToggles.forEach((toggle) => {
                toggle.addEventListener("click", () => {
                    const target = toggle.getAttribute("data-modal-target");
                    const modal = document.getElementById(target);
                    modal.classList.toggle("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });

            modalCloses.forEach((close) => {
                close.addEventListener("click", () => {
                    const target = close.getAttribute("data-modal-hide");
                    const modal = document.getElementById(target);
                    modal.classList.add("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });
        });
    </script>
</body>
</html>
