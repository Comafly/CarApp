<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cars') }}
            </h2>

                <a href="{{ route('cars.create') }}"
                   class="flex-0 rounded text-stone-100 bg-stone-500 p-1 mx-2 my-2">
                    {{ __("Add Car") }}
                </a>

                <div>
                    <form method="get" action="{{ route('cars.index')}}">
                        <label for="search">Search:</label>
                        <input type="text" id="search" name="search" placeholder="Enter search term">
                        <button class="flex-0 rounded text-stone-100 bg-stone-500 p-1 mx-2 my-2" type="submit" name="go">GO!</button>
                    </form>
                </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table w-full ">
                        <thead>
                        <tr class="gap-2">
                            <th class="text-left px-2 mx-2">ID</th>
                            <th class="text-left px-2 mx-2">Code</th>
                            <th class="text-left px-2 mx-2">Manufacturer</th>
                            <th class="text-left px-2 mx-2">Model</th>
                            <th class="text-left px-2 mx-2">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cars as $key=>$car)
                            <tr class="gap-2 border border-1 border-stone-400">
                                <td class="border px-2 py-1">{{ $key+1 }}</td>
                                <td class="border w-4/12 text-left px-2 py-1">{{ $car->code }}</td>
                                <td class="border w-4/12 text-left px-2 py-1">{{ $car->manufacturer }}</td>
                                <td class="border w-4/12 text-left px-2 py-1">{{ $car->model }}</td>
                                <td class="border w-4/12 text-left px-2 py-1">{{ $car->price }}</td>
                                <td class="border px-2 py-1">
                                    <div class="flex justify-end gap-1">

                                        <a href="{{ route('cars.show', $car->id) }}"
                                           class="px-2 py-1 rounded text-center w-16
                                                  bg-emerald-500 text-emerald-100 border border-emerald-50
                                                  hover:bg-emerald-100 hover:border-emerald-500 hover:text-emerald-700 hover:shadow-inner
                                                  hover:shadow-sm hover:shadow-emerald-900
                                                  transition ease-in-out duration-500">
                                            View
                                        </a>

                                        <a href="{{ route('cars.edit', $car->id) }}"
                                           class="px-2 py-1 rounded text-center w-16
                                                  bg-sky-500 text-sky-100 border border-sky-50
                                                  hover:bg-sky-100 hover:border-sky-500 hover:text-sky-700 hover:shadow-inner
                                                  hover:shadow-sm hover:shadow-sky-900
                                                  transition ease-in-out duration-500">
                                            Edit
                                        </a>


                                        <a href="{{ route('cars.delete', $car->id) }}"
                                           class="px-2 py-1 rounded text-center w-16
                                                  bg-red-50 text-red-500 border border-red-500
                                                  hover:bg-red-500 hover:border-red-500 hover:text-red-50 hover:shadow-inner
                                                  hover:shadow-red-900
                                                  transition ease-in-out duration-500">
                                            Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                {{ $cars->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
