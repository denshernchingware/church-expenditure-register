<x-filament-panels::page>

    {{-- ✅ use filament::section instead of filament-panels::card --}}
    <x-filament::section>

        <div class="space-y-6">

            <h1 class="text-2xl font-bold text-gray-950 dark:text-white">
                Offering Financial Report
            </h1>

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

                        @foreach($offerings as $offering)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">

                                {{-- ✅ fixed: use correct column names --}}
                                <td class="px-4 py-3 font-medium border-r border-gray-200 dark:border-gray-700">
                                    {{ $offering->user?->first_name }} {{ $offering->user?->last_name }}
                                </td>

                                @foreach($types as $type)
                                    <td class="px-4 py-3 text-right border-r border-gray-200 dark:border-gray-700">
                                        {{ number_format(
                                            $offering->items->where('type', $type)->sum('amount'),
                                            2
                                        ) }}
                                    </td>
                                @endforeach

                                <td class="px-4 py-3 text-right font-semibold">
                                    {{ number_format($offering->total_amount, 2) }}
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
                                        $offerings->sum(fn($offering) =>
                                            $offering->items->where('type', $type)->sum('amount')
                                        ),
                                        2
                                    ) }}
                                </td>
                            @endforeach

                            <td class="px-4 py-3 text-right">
                                {{ number_format($offerings->sum('total_amount'), 2) }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>

    </x-filament::section>  {{-- ✅ closed correctly --}}

</x-filament-panels::page>
