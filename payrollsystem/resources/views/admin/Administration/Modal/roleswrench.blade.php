<!-- Modal Structure -->
<div id="manage-users" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
<div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col max-w-2xl w-full h-full overflow-y-auto">
        <button onclick="closemanageusers()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Manage Users</h2>

        <div class="space-y-4">

            <div class="flex items-center justify-between">
                <div>
                    <span class="block text-lg font-medium text-gray-800">John Doe</span>
                    <span class="block text-sm text-gray-600">Software Engineer</span>
                </div>
                <button class="text-red-500 hover:text-red-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <input type="text" id="employee-name" placeholder="+Add" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />

            

            <div class="flex justify-end mt-4 gap-2">
                <button onclick="closemanageusers()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
                <button onclick="submitForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
            </div>
        </div>
    </div>
</div>
