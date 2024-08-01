<!DOCTYPE html>
<html lang="en">
@vite(['resources/css/app.css', 'resources/js/app.js']) 
@include('layouts.navigation')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        .delete-button {
            cursor: pointer;
            font-size: 18px;
            color: white;
            background-color: #f44336;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 10px; /* Add margin to separate from other buttons */
            margin-left: 65%; /* Align to the right */
            width: 20%; /* Make the button size consistent */
        }

        .delete-button:hover {
            background-color: #cc0000;
        }

        .trash-can {
            cursor: pointer;
            font-size: 24px;
            color: white;
        }

        .container {
            max-height: calc(100vh - 130px); /* Adjust according to your footer and header height */
            overflow-y: auto;
        }

        .cart-item {
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        h1 {
            margin-left: 3%;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 15px;
            margin-left: 3%;
        }

        .item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            margin-left: 10%;
        }

        .item img {
            width: 150px;
            height: 150px;
            margin-right: 20px;
            margin-top: 3%;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #e0e0e0;
        }

        .item-details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 5%;
        }

        .item-details p {
            margin: 5px 0;
            font-weight: bold;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .quantity button {
            width: 35px;
            height: 35px;
            background-color: #f0f0f0;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .quantity button:hover {
            background-color: #e0e0e0;
        }

        .quantity input {
            width: 40px;
            text-align: center;
            border: none;
            background-color: #f0f0f0;
            margin: 0 10px;
            padding: 5px 0;
            border-radius: 5px;
        }

        .reserve {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            margin-left: 65%;
            transition: background-color 0.3s ease;
            width: 20%;
        }

        .reserve:hover {
            background-color: #45a049;
        }

        .reserved-date {
            display: none;
            margin-top: 10px;
            font-weight: bold;
        }

        .cancel-reservation {
            display: none;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 5px;
            margin-left: 60%;
            margin-right: 10%;
            transition: background-color 0.3s ease;
        }

        .cancel-reservation:hover {
            background-color: #cc0000;
        }

        .price {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        .calendar {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }

        .calendar input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .calendar button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .calendar button:hover {
            background-color: #45a049;
        }

        footer {
            position: relative; 
            bottom: -100;
            left: 0;
            width: 100%;
            margin-top: 4%;
            background-color: #f0f0f0;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .bottom-nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
        }

        .bottom-nav a {
            text-align: center;
            text-decoration: none;
            color: #333;
        }

        .bottom-nav a img {
            width: 30px;
            height: 30px;
            margin-bottom: 5px;
        }

    </style>
</head>
<body>
    <div class="cart-item">
        <h2>{{ Auth::user()->name }} Product</h2>
        <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtRqsbpNzTz8wXYvdqnFq9VRcj5uBoeaM13w&s" alt="Whole Chicken">
            <div class="item-details">
                <p>{{ $product->product_name }}</p>
                <span class="item-category">{{ $product->product_description }}</span>
                <br>
                <div class="quantity">
                    <button class="decrement" onclick="updateQuantity(this, -1)">-</button>
                    <input type="text" value="1" readonly>
                    <button class="increment" onclick="updateQuantity(this, 1)">+</button>
                </div>
                <button class="reserve" onclick="showCalendar(this)">Reserve</button>
                <p class="reserved-date"></p>
                <button class="cancel-reservation" onclick="cancelReservation(this)">Cancel Reservation</button>
                <button class="delete-button" onclick="deleteProduct(this)">Delete</button>
                <p class="price">₱ {{ $product->price }}</p>
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
        const input = button.parentElement.querySelector('input');
        let currentValue = parseInt(input.value);
        currentValue += increment;

        if (currentValue < 0) {
            currentValue = 0;
        }

        input.value = currentValue;
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
