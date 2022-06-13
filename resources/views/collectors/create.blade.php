<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Collectors') }}
            </h2>
            <div>
                <a href="{{ route('collectors.create') }}"
                   class="flex-0 rounded text-stone-100 bg-stone-500 p-1 mx-2">
                    {{ __("Add Collector") }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('collectors.store') }}"
                          method="post"
                          class="">
                        @csrf

                        <div class="flex w-full my-6 ">
                            <div class="w-32 pt-2"></div>
                            <h3 class="flex-1 border-1 border-stone-300 text-2xl">
                                Add New Collector
                            </h3>
                        </div>

                        <div class="flex w-full my-6 ">
                            <label for="GivenName" class="w-32 pt-2">Given Name</label>
                            <input type="text" id="GivenName" name="given_name"
                                   value="{{old('given_name')}}"
                                   class="flex-1 rounded-md border-1 border-stone-300
                                           @error('given_name') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('given_name')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The given name is optional
                        </p>
                        @enderror

                        <div class="flex w-full mt-6 ">
                            <label for="FamilyName" class="w-32 pt-2">Family name</label>
                            <input type="text" id="FamilyName" name="family_name"
                                   value="{{old('family_name')}}"
                                   class="flex-1 rounded-md border-1 border-stone-300
                                           @error('family_name') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('family_name')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The family name is required and must be at least one character long (not whitespace)
                        </p>
                        @enderror

                        <div class="flex w-full my-6 ">
                            <label for="Cars" class="w-32 pt-2">Owned Cars</label>
                            <input type="text" id="Cars" name="cars"
                                   class="flex-1 rounded-md border-1 border-stone-300
                                           @error('cars') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('cars')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            A car is required.
                        </p>
                        @enderror

                        <div class="flex w-full my-6 gap-4">
                            <label for="" class="w-32"> </label>
                            <button type="submit" name="save"
                                    class="rounded w-24 p-2
                                    bg-sky-500 -ml-4 text-sky-100 border border-sky-50 shadow-md
                                    hover:bg-sky-100 hover:border-sky-500 hover:text-sky-500 hover:shadow-sm
                                    transition ease-in-out duration-500">
                                Save
                            </button>
                            <button type="submit" name="save"
                                    class="rounded w-24  p-2
                                    bg-amber-500 text-amber-100 border border-amber-50 shadow-md
                                    hover:bg-amber-100 hover:border-amber-500 hover:text-amber-500 hover:shadow-sm
                                    transition ease-in-out duration-500">
                                Clear
                            </button>
                            <a href="{{ route('collectors.index') }}"
                               class="rounded text-center w-24 p-2
                               bg-stone-500 text-stone-100 border border-stone-50 shadow-md
                               hover:bg-stone-100 hover:border-stone-500 hover:text-stone-500 hover:shadow-sm
                               transition ease-in-out duration-500">
                                Back
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
