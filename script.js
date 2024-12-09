const products = [
    {
        id: 1, name: 'Checkered Casual shirt', description: "Crafted from premium breathable cotton, this shirt features a timeless checkered pattern in versatile tones, making it a perfect choice for any occasion—whether you're heading to the office or out for a casual evening. The relaxed fit ensures all-day comfort, while the button-down collar and neatly stitched cuffs add a touch of sophistication. Pair it with jeans for a laid-back vibe or chinos for a more polished look.",
        newPrice: 6000, oldPrice: 5000, image: 'images/p3.jpg'
    },
    { id: 2, name: 'Checkered Casual shirt', description: "Crafted from premium breathable cotton, this shirt features a timeless checkered pattern in versatile tones, making it a perfect choice for any occasion—whether you're heading to the office or out for a casual evening. The relaxed fit ensures all-day comfort, while the button-down collar and neatly stitched cuffs add a touch of sophistication. Pair it with jeans for a laid-back vibe or chinos for a more polished look.", newPrice: 6000, oldPrice: 5000, image: 'images/p2.jpg' },
    { id: 3, name: 'Checkered Casual shirt', description: "Crafted from premium breathable cotton, this shirt features a timeless checkered pattern in versatile tones, making it a perfect choice for any occasion—whether you're heading to the office or out for a casual evening. The relaxed fit ensures all-day comfort, while the button-down collar and neatly stitched cuffs add a touch of sophistication. Pair it with jeans for a laid-back vibe or chinos for a more polished look.", newPrice: 6000, oldPrice: 5000, image: 'images/p3.jpg' },
    { id: 4, name: 'Checkered Casual shirt', description: "Crafted from premium breathable cotton, this shirt features a timeless checkered pattern in versatile tones, making it a perfect choice for any occasion—whether you're heading to the office or out for a casual evening. The relaxed fit ensures all-day comfort, while the button-down collar and neatly stitched cuffs add a touch of sophistication. Pair it with jeans for a laid-back vibe or chinos for a more polished look.", newPrice: 6000, oldPrice: 5000, image: 'images/product.jpg' },
    { id: 5, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/p3.jpg' },
    { id: 6, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/product.jpg' },
];

const productContainer = document.querySelector('.products-div');

if (productContainer) {
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('products-display');
        productDiv.innerHTML = `
            <div class="product-image">
                            <img src="${product.image}" alt="product" onclick="singleProduct(${product.id})">
                            <button class="cart-button">
                                Add to cart
                            </button>
                        </div>
                        <h4>${product.name}</h4>
                        <span class="price">
                            <del>Ksh ${product.oldPrice}</del>
                            Ksh ${product.newPrice}
                        </span>
            `;
        productContainer.appendChild(productDiv);
    });
} else {
    console.error('Products container not found!');
}

function singleProduct(productId) {
    localStorage.setItem('selectedProductId', productId);
    window.location.href = `single-product.html?id=${productId}`;
}

function singleProductDetails() {
    const productId = localStorage.getItem('selectedProductId');
    if (productId) {
        const product = products.find(p => p.id === Number(productId));
        if (product) {
            const singleImg = document.querySelector('.single-image img');
            const singleTitle = document.querySelector('.product-description h2');
            const singleOldprice = document.querySelector('.product-description del');
            const singleNewprice = document.querySelector('.product-description h3');
            const singleDescription = document.querySelector('.product-description p');

            if (singleImg) {
                singleImg.src = product.image;
            }
            if (singleTitle) {
                singleTitle.innerHTML = product.name;
            }
            if (singleOldprice) {
                singleOldprice.innerHTML = `Ksh ${product.oldPrice}`;
            }
            if (singleNewprice) {
                singleNewprice.innerHTML = `Ksh ${product.newPrice}`;
            }
            if (singleDescription) {
                singleDescription.innerHTML = product.description;
            }
        }
    }
};

if (document.querySelector('.single-container')) {
    singleProductDetails();
}