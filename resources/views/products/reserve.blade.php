<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @include('layouts.navigation')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a Product</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff;
    color: white;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header .title {
    font-size: 24px;
    font-weight: bold;
}

.container {
    max-height: calc(100vh - 130px);
    overflow-y: auto;
    padding: 20px;
}

.cart-item {
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.cart-item img {
    width: 100%;
    max-width: 180px;
    height: auto;
    border-radius: 12px;
    object-fit: cover;
    border: 1px solid #ddd;
    margin-bottom: 15px;
}

.cart-item .details {
    width: 100%;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

h2 {
    color: black;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
}

.item-details p {
    margin: 8px 0;
    font-weight: 500;
    color: #333;
}

.quantity {
    display: flex;
    align-items: center;
    margin-top: 15px;
}

.quantity button {
    width: 40px;
    height: 40px;
    background-color: #e9ecef;
    border: 1px solid #ddd;
    cursor: pointer;
    font-size: 20px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.quantity button:hover {
    background-color: #dee2e6;
}

.quantity input {
    width: 50px;
    text-align: center;
    border: 1px solid #ddd;
    background-color: #e9ecef;
    margin: 0 15px;
    padding: 8px 0;
    border-radius: 6px;
}

.reserve {
    background-color: green;
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    border-radius: 6px;
    margin-top: 20px;
    width: 100%;
    max-width: 200px;
    transition: background-color 0.3s ease;
}

.reserve:hover {
    background-color: darkgreen;
}

.price {
    margin-top: 15px;
    font-weight: 600;
    color: #333;
}

.calendar {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    z-index: 1000;
    width: 90%;
    max-width: 450px;
}

.calendar input[type="date"] {
    padding: 12px;
    font-size: 18px;
    border: 1px solid #ddd;
    border-radius: 6px;
    width: 100%;
    margin-bottom: 15px;
}

.calendar button {
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.calendar button:hover {
    background-color: #0056b3;
}

/* Reserved Info Styles */
.reserved-info {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.reserved-date {
    color: #333;
    font-weight: 500;
}

.cancel-reservation {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

.cancel-reservation:hover {
    background-color: #c82333;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
    }

    .header .title {
        font-size: 20px;
    }

    .cart-item {
        padding: 15px;
        flex-direction: column;
    }

    .cart-item img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .reserve {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .header .title {
        font-size: 18px;
    }

    .quantity {
        flex-direction: column;
        align-items: stretch;
    }

    .quantity button, .quantity input {
        width: 100%;
        margin: 5px 0;
    }

    .calendar {
        padding: 20px;
        width: 100%;
    }
}

    </style>
</head>
<body>
   
    
<div class="container">
    <div class="cart-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTziMhpKv63InSLRCrOzV8TZu2D5Adb2upSMMnSRhNMM9f-wvAtDnoViYQs6BJShIFaGeU&usqp=CAU" alt="Whole Chicken">
        <div class="details">
            <h2>{{ Auth::user()->name }} - {{$product->product_name}}</h2>
            <p>{{ $product->product_name }}</p>
            <span class="item-category">{{ $product->product_description }}</span>
            <br>
            <span class="item-category">Available Stock: {{ $product->qty }}</span>
            <div class="quantity">
                <button class="decrement" onclick="updateQuantity(this, -1)">-</button>
                <input type="text" value="1" readonly>
                <button class="increment" onclick="updateQuantity(this, 1)">+</button>
            </div>
            <form method="post" action="{{ route('product.save', ['product' => $product]) }}" onsubmit="return validateAndSubmit(this)">
                @csrf
                @method('post')
                <input type="hidden" name="quantity" id="qtyInput" value="1"/>
                <p class="price">₱ {{ $product->price }}</p>
                <label for="date">Pickup Date:</label>&nbsp;
                <input type="date" id="pickup_date" name="pickup_date"/>&nbsp;&nbsp;
                <label for="notes">Notes:</label>&nbsp;
                <input type="text" name="notes"/>
                <br>
                <input type="submit" class="reserve" value="Reserve"/>
            </form>
            <div class="reserved-info">
                <span class="reserved-date"></span>
                <button class="cancel-reservation" onclick="cancelReservation(this)" style="display:none;">Cancel Reservation</button>
            </div>
        </div>
    </div>
</div>


    <div id="calendar" class="calendar">
        <input type="date">
        <button onclick="hideCalendar()">Close</button>
    </div>
</body>

<script>
    function updateQuantity(button, increment) {

        const stock = {{$product -> qty}};

        const input = button.parentElement.querySelector('input[type="text"]');
        let currentValue = parseInt(input.value);
        currentValue += increment;

        if (currentValue < 0) {
            currentValue = 0;
        }else if(currentValue > stock)
        {
            currentValue = stock;
        }

        input.value = currentValue;
        document.getElementById('qtyInput').value = currentValue;
    }

    function validateAndSubmit(form) {
        const quantity = parseInt(document.getElementById('qty-input').value);
        if (quantity > availableStock) {
            alert("Quantity exceeds available stock.");
            return false;
        }
        return true; 
    }

    function showCalendar(button) {
        const calendar = document.getElementById('calendar');
        const dateInput = calendar.querySelector('input[type="date"]');
        const reserveButton = button;
        const itemDetails = reserveButton.parentElement;
       
        calendar.style.display = 'block';

        calendar.reserveButton = reserveButton;
        calendar.itemDetails = itemDetails;
    }

    function hideCalendar() {
        const calendar = document.getElementById('calendar');
        calendar.style.display = 'none';
    }

    function cancelReservation(button) {
        const itemDetails = button.parentElement;
        const reserveButton = itemDetails.querySelector('.reserve');
        const reservedDate = itemDetails.querySelector('.reserved-date');
        const cancelReservationButton = itemDetails.querySelector('.cancel-reservation');

        reserveButton.innerText = 'Reserve';
        reservedDate.innerText = '';
        cancelReservationButton.style.display = 'none';
    }

    document.getElementById('calendar').addEventListener('change', function() {
        const calendar = document.getElementById('calendar');
        const dateInput = calendar.querySelector('input[type="date"]');
        const reserveButton = calendar.reserveButton;
        const itemDetails = calendar.itemDetails;
        const reservedDate = itemDetails.querySelector('.reserved-date');
        const cancelReservationButton = itemDetails.querySelector('.cancel-reservation');

        if (dateInput.value) {
            reserveButton.innerText = 'Reserved: ' + dateInput.value;
            reservedDate.innerText = 'Reserved: ' + dateInput.value;
            cancelReservationButton.style.display = 'inline-block';
        }

        hideCalendar();
    });

    function deleteProduct(button) {
        const cartItem = button.closest('.cart-item');
        cartItem.remove();
    }
</script>
</html>
