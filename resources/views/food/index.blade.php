@extends('app')

@section('content')
    <!-- Table Section -->
    <div class="py-10 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="grid gap-3 py-4 px-6 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Potraviny v lednici
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Vytvářejte, upravujte a spravujte potraviny </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-semibold text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('food.create') }}">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Vytvořit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Název
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Datum výroby
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Datum nákupu
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Datum minimální trvanlivosti
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Datum spotřeby
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Fotografie produktu
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                                @foreach ($foods as $food)
                                    <tr>

                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">

                                                <span
                                                    class="text-sm text-gray-600 dark:text-neutral-400">{{ $food->name }}</span>
                                                <div class="-mt-4">
                                                    @if ($food->halfLife->lt(now()))
                                                        <span
                                                            class="inline-block px-6 border border-red-600 h-[1px]"></span>
                                                    @elseif (($food->expiry_date ?? $food->minimum_expiry_date)->lt(now()))
                                                        <span
                                                            class="inline-block px-6 border border-orange-600 h-[1px]"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="text-sm text-gray-600 dark:text-neutral-400">{{ $food->manufactured_at->format('d/m/Y') }}</span>
                                            </div>
                                        </td>

                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="text-sm text-gray-600 dark:text-neutral-400">{{ $food->manufactured_at->format('d/m/Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="text-sm text-gray-600 dark:text-neutral-400">{{ $food->minimum_expiry_date->format('d M Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="text-sm text-gray-600 dark:text-neutral-400">{{ $food->expiry_date->format('d/m/Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <img src="{{ $food->photo }}" class="object-contain rounded max-w-16">
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="flex gap-x-6 items-center">
                                                <a href="{{ route('food.destroy', $food) }}" data-turbo-method="delete"
                                                    data-turbo-confirm="Tuto akci nelze vrátit zpět. Jsi si jistá?">
                                                    <button
                                                        class="transition-colors duration-200 hover:text-red-500 focus:outline-none text-slate-500 dark:text-slate-300 dark:hover:text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <a href="{{ route('food.edit', $food) }}">
                                                    <button
                                                        class="transition-colors duration-200 hover:text-yellow-500 focus:outline-none text-slate-500 dark:text-slate-300 dark:hover:text-yellow-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>
                                                </a>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div class="py-6 px-4 border-t">
                            {{ $foods->links('pagination::tailwind') }}
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
@endsection
