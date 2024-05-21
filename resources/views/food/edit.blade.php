@extends('app')

@section('content')
    <!-- Card Section -->
    <div class="py-10 px-4 mx-auto max-w-2xl sm:px-6 lg:py-14 lg:px-8">
        <!-- Card -->
        <div class="p-4 bg-white rounded-xl border shadow-sm sm:p-8 dark:bg-neutral-900">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                    Záznam potravin
                </h2>
            </div>

            <form action="{{ route('food.update', $food) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <!-- Section -->
                <div class="py-6">
                    <div class="mt-2 space-y-3">
                        <x-form.label>
                            Název potraviny
                        </x-form.label>


                        <x-form.input type="text" class="mt-1 w-full" name="name" :value="$food->name" />
                    </div>

                    <div class="mt-2 space-y-3">
                        <x-form.label>
                            Datum výroby
                        </x-form.label>


                        <x-form.input type="text" class="mt-1 w-full" name="manufactured_at" data-controller="datepicker"
                            :value="$food->manufactured_at->format('Y-m-d')" />
                    </div>

                    <div class="mt-2 space-y-3">
                        <x-form.label>
                            Datum nákupu
                        </x-form.label>


                        <x-form.input type="text" class="mt-1 w-full" name="purchased_at" data-controller="datepicker"
                            :value="$food->purchased_at->format('Y-m-d')" />
                    </div>

                    <div class="mt-2 space-y-3">
                        <x-form.label>
                            Datum minimální trvanlivost
                        </x-form.label>


                        <x-form.input type="text" class="mt-1 w-full" name="minimum_expiry_date"
                            data-controller="datepicker" :value="$food->minimum_expiry_date->format('Y-m-d')" />
                    </div>

                    <div class="mt-2 space-y-3">
                        <x-form.label>

                            Datum spotřeby
                        </x-form.label>


                        <x-form.input type="text" class="mt-1 w-full" name="expiry_date" data-controller="datepicker"
                            :value="$food->expiry_date->format('Y-m-d')" />
                    </div>


                    <div class="mt-3 space-y-3">
                        <x-form.label>
                            Fotografie produktu
                        </x-form.label>


                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file"
                                class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400 hover:file:bg-blue-700">
                        </label>
                    </div>

                    <div class="flex gap-x-2 justify-end mt-5">

                        <button type="submit"
                            class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-semibold text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Uložit změny
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
