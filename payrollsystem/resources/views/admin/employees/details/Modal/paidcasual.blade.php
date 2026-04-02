<div id="leaveModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl mb-4">Request Leave</h2>
        <div class="mb-4">
            <label for="amountDays" class="block text-gray-700">Amount day(s)</label>
            <input type="number" id="amountDays" name="amountDays" class="mt-2 w-full border border-gray-300 rounded-md px-3 py-2" min="1">
        </div>
        <div class="flex justify-end">
            <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2" onclick="toggleModal()">Cancel</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </div>
    </div>
</div>