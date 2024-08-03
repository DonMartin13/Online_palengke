<!DOCTYPE html>
<html lang="en">

@vite(['resources/css/app.css', 'resources/js/app.js']) 
@include('layouts.navigation')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Store Capstone</title>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
:root {
    --primary: #141414;
    --primaryLight: #f2ac19;
    --secondary: #f2ac19;
    --secondaryLight: #f2ac19;
    --headerColor: #1a1a1a;
    --bodyTextColor: #4e4b66;
    --bodyTextColorWhite: #fafbfc;
    --headerFontSize: clamp(1.9375rem, 3.9vw, 3.0625rem);
    --bodyFontSize: 1rem;
    
}

body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

*, *:before, *:after {
    box-sizing: border-box;
}

.store-title {
    font-size: var(--headerFontSize);
    font-weight: 900;
    line-height: 1.2em;
    text-align: inherit;
    max-width: 43.75rem;
    margin: 0 0 1rem 0;
    color: var(--headerColor);
    position: relative;
}


/* Mobile Section*/
@media only screen and (min-width: 0rem) {
    #accStore-section {
        padding: var(--sectionPadding);
    }
    #accStore-section .store-container {
        width: 100%;
        max-width: 80rem;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: clamp(3rem, 6vw, 4rem);
        position: relative;
        z-index: 1;
    }
    #accStore-section .store-content {
        text-align: center;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }
    #accStore-section .store-title {
        margin: 0;
    }
    #accStore-section .store-filter-buttons {
        margin: 0;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: clamp(1rem, 4vw, 2rem);
    }
    #accStore-section .filter-button {
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.2em;
        text-transform: uppercase;
        padding: 0;
        color: var(--bodyTextColor);
        background-color: transparent;
        border: none;
        position: relative;
        transition: color 0.3s;
    }
    #accStore-section .filter-button:before {
        content: "";
        width: 0;
        height: 1px;
        background: var(--primary);
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        transition: width 0.3s;
    }
    #accStore-section .filter-button:hover {
        color: var(--primary);
        cursor: pointer;
    }
    #accStore-section .filter-button:hover:before {
        width: 100%;
    }
    #accStore-section .filter-button.activeClass {
        color: var(--primary);
    }
    #accStore-section .filter-button.activeClass:before {
        width: 100%;
    }
    #accStore-section .listing-wrapper {
        width: 100%;
        position: relative;
        z-index: 1;
    }
    #accStore-section .store-listing {
        width: 100%;
        margin: 0;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        justify-items: center;
        gap: clamp(1rem, 1.5vw, 1.25rem);
        position: relative;
        perspective: 700px;
    }
    #accStore-section .store-item {
        width: 100%;
        max-width: 23.4375rem;
        min-width: 0;
        opacity: 1;
        padding: 1rem;
        border: 1px solid #e8e8e8;
    }
    #accStore-section .item-link {
        text-decoration: none;
    }
    #accStore-section .item-link:hover .item-picture img {
        transform: scale(1.1);
    }
    #accStore-section .picture-group {
        width: auto;
        height: 18.75rem;
        margin-bottom: 1.25rem;
        position: relative;
    }
    #accStore-section .item-picture {
        width: 100%;
        height: 100%;
        background-color: #f6f6f6;
        overflow: hidden;
        display: block;
    }
    #accStore-section .item-picture img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    #accStore-section .item-discount {
        font-size: 0.8125rem;
        font-weight: 700;
        line-height: 1.2em;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        padding: 0.375rem;
        color: #fff;
        background: #ff4747;
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
    }
    #accStore-section .item-category {
        font-size: 1rem;
        line-height: 1.5em;
        color: #767676;
    }
    #accStore-section .item-name {
        font-size: clamp(1.25rem, 1vw, 1.5625rem);
        font-weight: 700;
        line-height: 1.2em;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
        margin: 0;
        color: var(--headerColor);
        overflow: hidden;
    }
    #accStore-section .item-options {
        margin-top: 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #accStore-section .item-price {
        font-size: 1.15rem;
        font-weight: 700;
        line-height: 1.2em;
        color: var(--secondary);
    }
    #accStore-section .discountOld-price {
        font-size: 0.8rem;
        font-weight: 700;
        line-height: 1.2em;
        text-decoration: line-through;
        color: #767676;
    }
    #accStore-section .item-ratings {
        margin-top: 0.25rem;
        display: flex;
    }
    #accStore-section .item-star {
        width: 1.25rem;
        height: 1.25rem;
    }
    #accStore-section .item-reserve {
        max-height: 2.5rem;
        padding: 0.5rem;
        background: none;
        border: 2px solid var(--primary);
        border-radius: 1.4rem;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: border-color 0.3s;
    }
    #accStore-section .item-reserve:hover {
        border-color: var(--secondary);
    } 
    #accStore-section .item-reserve:hover{
        transform: scale(1.1); 
        transition: transform 0.3s; 
    }
}

/* Tablet Section*/
@media only screen and (min-width: 48rem) {
    #accStore-section .store-content {
        flex-direction: row;
        justify-content: space-between;
    }
    #accStore-section .store-listing {
        grid-template-columns: repeat(4, 1fr);
    }
    #accStore-section .store-item {
        max-width: none;
    }
    #accStore-section .picture-group {
        height: clamp(12.5rem, 23vw, 20rem);
    }
}
</style>

<body>
    <section id="accStore-section">
        <div class="store-container">
            <div class="store-content"></div>
            <div class="listing-wrapper">
                <div class="store-listing">
                    @foreach($products as $product)
                    <div class="store-item">
                        <a href="" class="item-link">
                            <div class="picture-group">
                                <picture class="item-picture">
                                    <source src="" media="(max-width: 600px)">
                                    <img loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtRqsbpNzTz8wXYvdqnFq9VRcj5uBoeaM13w&s" alt="gallery" width="305" height="400">
                                </picture>
                            </div>
                            <div class="item-details">
                                <h3 class="item-name">{{ $product->product_name }}</h3>
                                <span class="item-category">{{ $product->product_description }}</span>
                                <div class="item-options">
                                    <div class="flex">
                                        <span class="item-price">₱ {{ $product->price }}</span>
                                    </div>
                                    <button class="item-reserve">
                                        <a href="{{ route('product.reserve', ['product' => $product]) }}" class="reserve-btn"><img src="https://cdn-icons-png.flaticon.com/512/3721/3721818.png" alt="buy" height="24" width="24" loading="lazy" decoding="async" /></a>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </section>
</body>
</html>
