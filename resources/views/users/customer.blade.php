<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a class="text-gray-500 hover:text-blue-700">Reserved Items</a>
                   <!--   <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-700">Reserved Items</a>-->
                </div>
            </div>
        </div>
    </div>

    <!-- DISPLAY IF MAY RESERVED ITEM -->
    @isset($reservations)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($reservations as $reservation)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://cdn.britannica.com/18/137318-050-29F7072E/rooster-Rhode-Island-Red-roosters-chicken-domestication.jpg" alt="Product Image" class="w-16 h-16 rounded-full">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">&nbsp&nbsp&nbsp&nbsp{{ $reservation->product->product_name }}</h3>
                        <p class="text-sm text-gray-500">&nbsp&nbsp&nbsp&nbsp&nbsp{{ $reservation->product->product_description }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Quantity:</span>
                        <span class="text-gray-900">{{ $reservation->quantity }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Price:</span>
                        <span class="text-gray-900">{{ $reservation->product->price }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Pickup Date:</span>
                        <span class="text-gray-900">{{ $reservation->pickup_date }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Notes:</span>
                        <span class="text-gray-900">{{ $reservation->notes }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endisset
</x-app-layout>

<style>
    @media (max-width: 640px) {
        .py-12 {
            padding-top: 6px;
            padding-bottom: 6px;
        }

        .max-w-7xl {
            max-width: 100%;
        }

        .sm\\:px-6 {
            padding-left: 16px;
            padding-right: 16px;
        }

        .lg\\:px-8 {
            padding-left: 16px;
            padding-right: 16px;
        }
    }
</style>
