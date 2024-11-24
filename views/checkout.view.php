<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<div class="checkout">
    <form id="checkoutForm">
    <div class="billing-details">
        <h2>Billing details</h2>
        <div class="mb-3">
            <label for="" class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Full Name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Country</label>
            <input type="text" class="form-control" placeholder="Country">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">State</label>
            <input type="text" class="form-control" placeholder="State">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Zip/postal code</label>
            <input type="text" class="form-control" placeholder="XXX">
        </div>
    </div>
    <div class="payment-method">
        <h2>Payment Method</h2>
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" class="form-control" required>
                    <option value="1">Credit Card</option>
                    <option value="2">Paypal</option>
                    <option value="3">Bank Transfer</option>
                </select>
            </div>
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" id="cardNumber" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
        </div>
        <div class="mb-3">
            <label for="expiryDate" class="form-label">Expiry Date</label>
            <input type="text" id="expiryDate" class="form-control" placeholder="MM/YY">
        </div>
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" id="cvv" class="form-control" placeholder="XXX">
        </div>
        <button class="btn btn-info">Place order</button>
    </div>
    </form>
    <div class="cart-summary bg-body-tertiary">
        <h4>Cart Summary</h4>
        <hr>
        <div id="cart-summary-products">
            <!-- Los productos del carrito se cargarán aquí dinámicamente -->
        </div>
        <h4 id="cart-total">Total: $0.00</h4>
    </div>
</div>
<?php require 'partials/footer.php' ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartSummaryContainer = document.getElementById('cart-summary-products');
  const cartTotalElement = document.getElementById('cart-total');

  // Obtener carrito del localStorage
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Verificar si el carrito está vacío
  if (cart.length === 0) {
    cartSummaryContainer.innerHTML = `
      <p>Your cart is empty. Please add some courses to your cart before checking out.</p>
    `;
  } else {
    let totalPrice = 0;

    // Iterar sobre los productos del carrito
    cart.forEach((product) => {
      // Crear un contenedor para cada producto
      const productElement = document.createElement('div');
      productElement.classList.add('product', 'mb-3');

      productElement.innerHTML = `
        <h4>${product.title}</h4>
        <p>By ${product.instructor || 'Unknown'}</p>
        <h5>MX$${product.price}</h5>
        <hr>
      `;

      // Actualizar el precio total
      totalPrice += parseFloat(product.price);

      // Agregar el producto al contenedor
      cartSummaryContainer.appendChild(productElement);
    });

    // Actualizar el precio total en la sección
    cartTotalElement.textContent = `Total: MX$${totalPrice.toFixed(2)}`;
  }
});

document.getElementById('checkoutForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Your cart is empty. Add some courses before checking out.');
        return;
    }

    const formData = new FormData(this);
    const courses = cart.map(item => item.id).join(',');
    const total = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);

    // Append cart data to the form
    formData.append('total', total);
    formData.append('courses', courses);

    // Send data to backend
    try {
        const response = await fetch('/checkout', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('Order placed successfully!');
            localStorage.removeItem('cart');
            window.location.href = '/';
        } else {
            alert(result.message || 'There was an issue processing your order.');
        }
    } catch (error) {
        alert('Failed to place the order. Please try again.');
    }
});

</script>