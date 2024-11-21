<x-app-layout>
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold">Electricity Billing Form</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" name="name" id="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300"
                    placeholder="Enter Customer Name" required />
            </div>

            <div>
                <label for="building_type" class="block text-sm font-medium text-gray-700">Building Type</label>
                <select name="building_type" id="building_type"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300">
                    <option value="Commercial">Commercial</option>
                    <option value="Residential">Residential</option>
                </select>
            </div>

            <div>
                <label for="month" class="block text-sm font-medium text-gray-700">Month</label>
                <select name="month" id="month"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                </select>
            </div>

            <div>
                <label for="usability" class="block text-sm font-medium text-gray-700">Usability (kWh)</label>
                <input type="number" name="usability" id="usability"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300"
                    placeholder="Enter Usability" required />
            </div>

            <div>
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <input type="text" name="state" id="state"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300"
                    placeholder="Enter State" required />
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-500 rounded-md shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                Save
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="max-w-5xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold">Electricity Billing Records</h1>

        <table class="w-full text-sm text-left text-gray-700 border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border border-gray-300">Name</th>
                    <th class="px-4 py-2 border border-gray-300">Building Type</th>
                    <th class="px-4 py-2 border border-gray-300">Month</th>
                    <th class="px-4 py-2 border border-gray-300">Usability (kWh)</th>
                    <th class="px-4 py-2 border border-gray-300">Bill (RM)</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    @foreach ($customer->usabilities as $usability)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border border-gray-300">{{ $customer->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $customer->building_type }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $usability->month }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $usability->usability }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $usability->bill }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <form method="POST" action="{{ route('destroy', $customer->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-white bg-red-500 rounded-md shadow-md hover:bg-red-600 focus:ring focus:ring-red-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
