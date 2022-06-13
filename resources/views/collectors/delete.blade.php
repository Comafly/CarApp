<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Collectors') }}
            </h2>
            <a href="{{ route('collectors.create') }}"
               class="flex-0 rounded text-stone-100 bg-stone-500 p-1 mx-2">
                {{ __("Add Collector") }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex w-full my-6 ">
                        <div class="w-32 pt-2"></div>
                        <h3 class="flex-1 text-xl">
                            {{ __('Delete Collector') }}
                        </h3>
                    </div>

                    <div class="flex w-full my-6 ">
                        <p class="w-32 text-stone-500">Given Name</p>
                        <p class="flex-1">
                            {{ $collector->given_name}}
                        </p>
                    </div>


                    <div class="flex w-full mt-6 ">
                        <p class="w-32 text-stone-500">Family Name</p>
                        <p class="flex-1 ">
                            {{ $collector->family_name }}
                        </p>

                    </div>


                    <div class="flex w-full my-6 ">
                        <p class="w-32 text-stone-500">Owned Cars</p>
                        <p class="flex-1 flex -ml-1 text-sm gap-1">
                            @foreach($collector->cars as $car)
                                <span class="p-1 px-2 rounded-full bg-stone-200 text-900">{{ $car }}</span>
                            @endforeach
                        </p>
                    </div>


                    <form class="flex w-full my-6 gap-4" method="post"
                          action="{{ route('collectors.destroy', $collector->id) }}">

                        @csrf
                        @method('DELETE')

                        <p class="w-32"></p>

                        <a href="{{ route('collectors.edit', $collector->id) }}"
                           class="-ml-4 rounded w-24 p-2 text-center
                                    bg-amber-500 text-amber-100 border border-amber-50 shadow-md
                                    hover:bg-amber-100 hover:border-amber-500 hover:text-amber-500 hover:shadow-sm
                                    transition ease-in-out duration-500">
                            Edit
                        </a>

                        <button type="submit"
                                class="rounded text-center w-24 p-2
                               bg-red-500 text-red-100 border border-red-50 shadow-md
                               hover:bg-red-100 hover:border-red-500 hover:text-red-500 hover:shadow-sm
                               transition ease-in-out duration-500">
                            Delete
                        </button>

                        <a href="{{ route('collectors.index') }}"
                           class="rounded text-center w-24 p-2
                               bg-stone-500 text-stone-100 border border-stone-50 shadow-md
                               hover:bg-stone-100 hover:border-stone-500 hover:text-stone-500 hover:shadow-sm
                               transition ease-in-out duration-500">
                            Back
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
