<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cars') }}
            </h2>
            <div>
                <a href="{{ route('cars.create') }}"
                   class="flex-0 rounded text-stone-100 bg-stone-500 p-1 mx-2">
                    {{ __("Add Car") }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('cars.update', ['car'=>$car->id]) }}"
                          method="post"
                          class="">
                        @csrf
                        @method('PATCH')

                        <div class="flex w-full my-6 ">
                            <div class="w-32 pt-2"></div>
                            <h3 class="flex-1 border-1 border-stone-300 text-2xl">
                                Edit car
                            </h3>
                        </div>

                        <div class="flex w-full my-6 ">
                            <label for="Code" class="w-32 pt-2">Code</label>
                            <input type="text" id="Code" name="code"
                                   value="{{old('code') ?? $car->code }}"
                                   class="flex-1 border-1 border-stone-300
                                   @error('code') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('code')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The code is optional
                        </p>
                        @enderror

                        <div class="flex w-full mt-6 ">
                            <label for="Manufacturer" class="w-32 pt-2">Manufacturer</label>
                            <input type="text" id="Manufacturer" name="manufacturer"
                                   value="{{old('manufacturer') ?? $car->manufacturer }}"
                                   class="flex-1 border-1 border-stone-300
                                   @error('manufacturer') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('manufacturer')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The manufacturer is optional
                        </p>
                        @enderror


                        <div class="flex w-full mt-6 ">
                            <label for="Model" class="w-32 pt-2">Model</label>
                            <input type="text" id="Model" name="model"
                                   value="{{old('model') ?? $car->model }}"
                                   class="flex-1 border-1 border-stone-300
                                   @error('model') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('model')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The model is optional
                        </p>
                        @enderror


                        <div class="flex w-full mt-6 ">
                            <label for="Price" class="w-32 pt-2">Price</label>
                            <input type="text" id="Price" name="price"
                                   value="{{old('price') ?? $car->price }}"
                                   class="flex-1 border-1 border-stone-300
                                   @error('price') text-red-500 border-red-500 @enderror">
                        </div>
                        @error('price')
                        <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                            The price is optional
                        </p>
                        @enderror

                        <div class="flex w-full my-6 gap-4">
                            <label for="" class="w-32"> </label>
                            <button type="submit" name="save"
                                    class="rounded w-24 p-2
                                    bg-sky-500 -ml-4 text-sky-100 border border-sky-50
                                    hover:bg-sky-100 hover:border-sky-500 hover:text-sky-500
                                    transition ease-in-out duration-250">
                                Save
                            </button>
                            <button type="submit" name="clear"
                                    class="rounded w-24  p-2
                                    bg-amber-500 text-amber-100 border border-amber-50
                                    hover:bg-amber-100 hover:border-amber-500 hover:text-amber-500
                                    transition ease-in-out duration-250">
                                Clear
                            </button>
                            <a href=""
                               class="rounded text-center w-24 p-2
                               bg-stone-500 text-stone-100 border border-stone-50
                               hover:bg-stone-100 hover:border-stone-500 hover:text-stone-500
                               transition ease-in-out duration-250">
                                Back
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
