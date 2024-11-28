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

document.getElementById('checkoutForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    if(validateForm()){
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
                window.location.href = '/paymentCompleted';
            } else {
                alert(result.message || 'There was an issue processing your order.');
            }
        } catch (error) {
            alert('Failed to place the order. Please try again.');
        }
    }
    else{
        alert('Please complete all the data.');
    }
});

  const paymentMethodSelect = document.getElementById('paymentMethod');
  const cardNumberInput = document.getElementById('cardNumber');
  const expiryDateInput = document.getElementById('expiryDate');
  const cvvInput = document.getElementById('cvv');
  const checkoutForm = document.getElementById('checkoutForm');

  // Crear inputs dinámicos para Paypal y Bank Transfer
  const dynamicInputContainer = document.createElement('div');
  dynamicInputContainer.id = 'dynamicInputContainer';
  dynamicInputContainer.className = 'mb-3';
  paymentMethodSelect.parentNode.insertAdjacentElement('afterend', dynamicInputContainer);

  // Función para manejar el cambio del método de pago
  function handlePaymentMethodChange() {
    const selectedMethod = paymentMethodSelect.value;

    // Limpiar inputs dinámicos
    dynamicInputContainer.innerHTML = '';
    cardNumberInput.parentElement.style.display = 'none';
    expiryDateInput.parentElement.style.display = 'none';
    cvvInput.parentElement.style.display = 'none';

    if (selectedMethod === '1') {
      // Mostrar inputs de tarjeta de crédito
      cardNumberInput.parentElement.style.display = 'block';
      expiryDateInput.parentElement.style.display = 'block';
      cvvInput.parentElement.style.display = 'block';
    } else if (selectedMethod === '2') {
      // Mostrar input para PayPal
      dynamicInputContainer.innerHTML = `
        <label for="paypalEmail" class="form-label">Paypal Email</label>
        <input type="email" id="paypalEmail" class="form-control" placeholder="Enter your PayPal email">
      `;
    } else if (selectedMethod === '3') {
      // Mostrar input para transferencia bancaria
      dynamicInputContainer.innerHTML = `
        <label for="bankReference" class="form-label">Bank Transfer Reference</label>
        <input type="text" id="bankReference" class="form-control" placeholder="Enter bank transfer reference">
      `;
    }
  }

  // Validar formulario
  function validateForm(){

    let isValid = true;
    const fullName = checkoutForm.querySelector('input[placeholder="Full Name"]');
    const email = checkoutForm.querySelector('input[placeholder="Email"]');
    const country = checkoutForm.querySelector('input[placeholder="Country"]');
    const state = checkoutForm.querySelector('input[placeholder="State"]');
    const zipCode = checkoutForm.querySelector('input[placeholder="XXX"]');

    if (!fullName.value.trim()) {
      alert('Full Name is required');
      isValid = false;
    }

    if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
      alert('Valid Email is required');
      isValid = false;
    }

    if (!country.value.trim()) {
      alert('Country is required');
      isValid = false;
    }

    if (!state.value.trim()) {
      alert('State is required');
      isValid = false;
    }

    if (!zipCode.value.trim()) {
      alert('Zip/postal code is required');
      isValid = false;
    }

    // Validar método de pago dinámico
    if (paymentMethodSelect.value === '1') {
      if (!cardNumberInput.value.trim() || !/^\d{16}$/.test(cardNumberInput.value)) {
        alert('Card Number must be 16 digits');
        isValid = false;
      }

      if (!expiryDateInput.value.trim() || !/^\d{2}\/\d{2}$/.test(expiryDateInput.value)) {
        alert('Expiry Date must be in MM/YY format');
        isValid = false;
      }

      if (!cvvInput.value.trim() || !/^\d{3}$/.test(cvvInput.value)) {
        alert('CVV must be 3 digits');
        isValid = false;
      }
    } else if (paymentMethodSelect.value === '2') {
      const paypalEmail = document.getElementById('paypalEmail');
      if (!paypalEmail || !/\S+@\S+\.\S+/.test(paypalEmail.value)) {
        alert('Valid PayPal email is required');
        isValid = false;
      }
    } else if (paymentMethodSelect.value === '3') {
      const bankReference = document.getElementById('bankReference');
      if (!bankReference || !bankReference.value.trim()) {
        alert('Bank transfer reference is required');
        isValid = false;
      }
    }

    if (isValid) {
      return true;
    }
    return false;
  }

  // Escuchar cambios en el método de pago
  paymentMethodSelect.addEventListener('change', handlePaymentMethodChange);

  // Inicializar el estado de los inputs
  handlePaymentMethodChange();
});
</script>
