<x-filament::page>

    <x-filament::section>

        <div class="space-y-6">

            <h1 class="text-2xl font-bold">
                Offering Financial Report
            </h1>

            @php
                $grouped = $offerings->groupBy('user_id');
            @endphp

            <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                <table class="min-w-full text-sm">

                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold border-r border-gray-200 dark:border-gray-700">
                                Member
                            </th>

                            @foreach($types as $type)
                                <th class="px-4 py-3 text-right font-semibold border-r border-gray-200 dark:border-gray-700">
                                    {{ ucfirst($type) }}
                                </th>
                            @endforeach

                            <th class="px-4 py-3 text-right font-semibold">
                                Total
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                        @foreach($grouped as $userId => $userOfferings)

                            @php
                                $allItems = $userOfferings->flatMap->items;
                                $user = $userOfferings->first()->user;
                            @endphp

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">

                                <td class="px-4 py-3 font-medium border-r border-gray-200 dark:border-gray-700">
                                    {{ $user?->name }} {{ $user?->last_name }}
                                </td>

                                @foreach($types as $type)
                                    <td class="px-4 py-3 text-right border-r border-gray-200 dark:border-gray-700">
                                        {{ number_format(
                                            $allItems->where('type', $type)->sum('amount'),
                                            2
                                        ) }}
                                    </td>
                                @endforeach

                                <td class="px-4 py-3 text-right font-semibold">
                                    {{ number_format($allItems->sum('amount'), 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                    <tfoot class="bg-gray-100 dark:bg-gray-800 font-bold">
                        <tr>

                            <td class="px-4 py-3 border-r border-gray-200 dark:border-gray-700">
                                Total
                            </td>

                            @foreach($types as $type)
                                <td class="px-4 py-3 text-right border-r border-gray-200 dark:border-gray-700">
                                    {{ number_format(
                                        $offerings->flatMap->items
                                            ->where('type', $type)
                                            ->sum('amount'),
                                        2
                                    ) }}
                                </td>
                            @endforeach

                            <td class="px-4 py-3 text-right">
                                {{ number_format(
                                    $offerings->flatMap->items->sum('amount'),
                                    2
                                ) }}
                            </td>

                        </tr>
                    </tfoot>

                </table>
            </div>

            {{-- Top 10 Members by Total Amount --}}
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Top 10 Members by Total Offering</h2>
                <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">Rank</th>
                                <th class="px-4 py-3 text-left font-semibold">Member Name</th>
                                <th class="px-4 py-3 text-right font-semibold">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($topOfferingsByMember as $index => $member)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $member->name }}</td>
                                    <td class="px-4 py-3 text-right">₹{{ number_format($member->total, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>



        </div>

    </x-filament::section>

</x-filament::page>
