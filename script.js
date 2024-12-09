const products = [
    { id: 1, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/p1.jpg' },
    { id: 2, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/p2.jpg' },
    { id: 3, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/p3.jpg' },
    { id: 4, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/product.jpg' },
    { id: 4, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/p3.jpg' },
    { id: 4, name: 'Checkered Casual shirt', newPrice: 6000, oldPrice: 5000, image: 'images/product.jpg' },
];

const productContainer = document.querySelector('.products-div');

if (productContainer) {
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('products-display');
        productDiv.innerHTML = `
            <div class="product-image">
                            <img src="${product.image}" alt="product">
                            <button class="cart-button">
                                Add to cart
                            </button>
                        </div>
                        <h4>${product.name}</h4>
                        <span class="price">
                            <del>Ksh ${product.oldPrice}</del>
                            Ksh${product.newPrice}
                        </span>
            `;
        productContainer.appendChild(productDiv);
    });
} else {
    console.error('Products container not found!');
}