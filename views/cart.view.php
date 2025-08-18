<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="cart">
  <h1>Shopping Cart</h1>
  <p id="cart-count">0 courses in Cart</p>
  <hr>
  
  <div class="empty-cart d-none">
    <img src="../images/worried-woman-svgrepo-com.svg" alt="">
    <h5>It seems your cart is empty. Look for new courses!</h5>
    <a href="/exploreCourses" class="btn btn-primary fs-4 fw-medium text-light">Go look for new courses</a>
  </div>
  
  <div class="filled-cart" >
    <div class="cart-products" id="cart-products">
      <!-- Los productos se agregarán aquí dinámicamente -->
    </div>
    <div class="checkout-cart">
      <span>Total:</span>
      <h2 id="total-price">MX$0.00</h2>
      <a href="/checkout" class="btn btn-primary fs-4 fw-medium text-light">Checkout</a>
    </div>
  </div>
</div>
<?php require "partials/footer.php" ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartProductsContainer = document.getElementById('cart-products');
  const totalPriceElement = document.getElementById('total-price');
  const cartCountElement = document.getElementById('cart-count');
  const emptyCartElement = document.querySelector('.empty-cart');
  const filledCartElement = document.querySelector('.filled-cart');

  // Obtener carrito del localStorage
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Verificar si el carrito está vacío
  if (cart.length === 0) {
    emptyCartElement.classList.remove('d-none');
    filledCartElement.classList.add('d-none');
  } else {
    emptyCartElement.classList.add('d-none');
    filledCartElement.classList.remove('d-none');

    let totalPrice = 0;

    // Iterar sobre los productos del carrito
    cart.forEach((product) => {
      // Crear un contenedor para cada producto
      const productElement = document.createElement('div');
      productElement.classList.add('cart-product', 'd-flex', 'justify-content-between', 'align-items-center', 'mb-3');

      productElement.innerHTML = `
        <div class="cart-course">
            <div class="cart-course-data">
                <img src="${product.image}" alt="${product.title}">
                <div class="cart-course-info">
                    <h5>${product.title}</h5>
                    <p>By ${product.instructor}</p>
                </div>
            </div>

            <div class="cart-course-options">
                <div class="cart-course-buttons">
                    <a href="" class="btn btn-outline-primary">See more</a>
                    <button class="btn btn-outline-primary remove-product" data-id="${product.id}">Remove</button>
                </div>
                <p class="fs-5 fw-bold" style="margin-top: 10px;">MX$${product.price}</p>
            </div>
        </div>
      `;

      // Actualizar precio total
      totalPrice += parseFloat(product.price);

      // Agregar el producto al contenedor
      cartProductsContainer.appendChild(productElement);

      // Agregar evento de clic a los botones de eliminación
      const removeButtons = document.querySelectorAll('.remove-product');
      removeButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
          const productId = e.target.getAttribute('data-id');
          removeProductFromCart(productId);
        });
      });
    });

    // Actualizar el precio total y la cantidad de productos
    totalPriceElement.textContent = `MX$${totalPrice.toFixed(2)}`;
    cartCountElement.textContent = `${cart.length} courses in Cart`;

    // Agregar evento de eliminación de productos
    const removeButtons = document.querySelectorAll('.remove-product');
    removeButtons.forEach((button) => {
      button.addEventListener('click', (e) => {
        const productId = e.target.getAttribute('data-id');
        removeProductFromCart(productId);
      });
    });
  }

  // Función para eliminar productos del carrito
  function removeProductFromCart(productId) {
    const updatedCart = cart.filter((product) => product.id !== productId);
    localStorage.setItem('cart', JSON.stringify(updatedCart));
    location.reload(); // Recargar para reflejar los cambios
  }
});

</script>