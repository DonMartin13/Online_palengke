<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('product.create') }}" class="text-blue-500 hover:underline">Add a new product</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Your Products</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-neutral-200 text-center text-sm font-light text-surface dark:border-white/10 dark:text-white">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-white/10 text-gray-900">
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Image</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Product Name</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Product Description</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Quantity</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Price</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Edit</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="border-b border-neutral-200 dark:border-white/10 text-gray-900">
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 flex justify-center items-center">
                                        <img src="https://cdn.britannica.com/18/137318-050-29F7072E/rooster-Rhode-Island-Red-roosters-chicken-domestication.jpg" alt="Product Image" class="w-12 h-12 rounded-full">
                                    </td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$product->product_name}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$product->product_description}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$product->qty}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$product->price}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4">
                                        <a class="text-blue-500 hover:underline" href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                                    </td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4">
                                        <form method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="text-red-500 hover:underline cursor-pointer">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @isset($reservations)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-neutral-200 text-center text-sm font-light text-surface dark:border-white/10 dark:text-white">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-white/10 text-gray-900">
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Image</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Product Name</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Product Description</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Quantity</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Price</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Pickup Date</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Notes</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Edit</th>
                                    <th scope="col" class="border-e border-neutral-200 px-6 py-4 dark:border-white/10">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($reservations as $reservation)
                                <tr class="border-b border-neutral-200 dark:border-white/10 text-gray-900">
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 flex justify-center items-center">
                                        <img src="https://cdn.britannica.com/18/137318-050-29F7072E/rooster-Rhode-Island-Red-roosters-chicken-domestication.jpg" alt="Product Image" class="w-12 h-12 rounded-full">
                                    </td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->product->product_name}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->product->product_description}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->quantity}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->price}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->pickup_date}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4 font-medium dark:border-white/10">{{$reservation->notes}}</td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4">
                                        <a class="text-blue-500 hover:underline" href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                                    </td>
                                    <td class="whitespace-nowrap border-e border-neutral-200 px-6 py-4">
                                        <form method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="text-red-500 hover:underline cursor-pointer">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endisset
</x-app-layout>
