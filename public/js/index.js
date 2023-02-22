$(document).ready(function () {
  // display cart count on page load
  getCartCount()
})

const increaseQuantity = (id) => {
  const data = {
    id_client: clientSession,
    id_product: id,
  }
  $.ajax({
    url: 'http://localhost/electro-maroc/carts/increaseQte',
    type: 'POST',
    data: data,
    success: function (res) {
      const response = JSON.parse(res)
      updateCartQuantity(id, response)
    },
  })
}

const decreaseQuantity = (id) => {
  const data = {
    id_client: clientSession,
    id_product: id,
  }
  $.ajax({
    url: 'http://localhost/electro-maroc/carts/decreaseQte',
    type: 'POST',
    data: data,
    success: function (res) {
      const response = JSON.parse(res)
      updateCartQuantity(id, response)
    },
    error: function (err) {
      const response = JSON.parse(err.responseText)
      Swal.fire({
        icon: response.status,
        title: response.message,
        timer: 1500,
      })
    },
  })
}

// Update cart quantity and total price
const updateCartQuantity = (id, data) => {
  const cartQuantity = document.querySelector('#qte' + id)
  const cartTotalPrice = document.querySelector('#totalPrice')
  cartQuantity.innerHTML = data.qte
  cartTotalPrice.innerHTML = data.total + 'DH'
}

const getCartCount = () => {
  const cartCountSpan = document.querySelector('#cartCount')

  if (!clientSession) {
    cartCountSpan.innerHTML = 0
  } else {
    $.ajax({
      url: 'http://localhost/electro-maroc/carts/count',
      type: 'GET',
      data: { id_client: clientSession },
      success: function (data) {
        console.log(data)
        cartCountSpan.innerHTML = data
      },
    })
  }
}

const addToCart = (id) => {
  if (!clientSession) {
    window.location.href = 'http://localhost/electro-maroc/clients/login'
    return
  } else {
    const data = {
      id_client: clientSession,
      id_product: id,
      qte: 1,
    }

    $.ajax({
      url: 'http://localhost/electro-maroc/carts/add',
      type: 'POST',
      data: data,
      success: function (res) {
        console.log(res)
        const response = JSON.parse(res)
        Swal.fire({
          icon: response.status,
          title: 'Success',
          html: `<p class="text-blue-400">${response.message}</p>`,
          timer: 1500,
        })
        getCartCount()
      },
    })
  }
}

// checkout
const checkout = () => {
  if (!clientSession) {
    window.location.href = 'http://localhost/electro-maroc/clients/login'
    return
  } else {
    $.ajax({
      url: 'http://localhost/electro-maroc/orders/confirme',
      type: 'GET',
      success: function (res) {
        console.log(res)
        const response = JSON.parse(res)
        Swal.fire({
          icon: response.status,
          title: response.message,
          text: 'Total' + response.total + 'DH',
          timer: 1500,
        })
        getCartCount()
        setTimeout(() => {
          window.location.href =
            'http://localhost/electro-maroc/accounts/orders'
        }, 1500)
      },
      error: function (err) {
        const response = JSON.parse(err.responseText)
        Swal.fire({
          icon: response.status,
          title: response.message,
          timer: 1500,
        })
      },
    })
  }
}

// Get Products By Commande Id (Order)
const getProducts = (id) => {
  $.ajax({
    url: 'http://localhost/electro-maroc/orders/products',
    type: 'GET',
    data: { id_commande: id },
    success: function (data) {
      const products = JSON.parse(data)
      displayProductsInSweetAlert(products);
    },
  })
}

// get client details in orders dashboard
const getClientDetails = (client_id) => {
  $.ajax({
    url: 'http://localhost/electro-maroc/dashboard/client',
    type: 'GET',
    data: { client_id: client_id },
    success: function (data) {
      
      const client = JSON.parse(data)
      displayClientInSweetAlert(client)
      
    },
  })
}


const displayClientInSweetAlert = (client) => {
  let html = ''
  html += `
 <div class="my-4 space-x-4">
  Full Name : <span class="text-gray-500">${client.fullName}</span>
  </div>
  <hr class="my-4">
  <div class="my-4 space-x-4">
    Phone Number : <span class="text-gray-500">${client.tel}</span>
  </div>
  <hr class="my-4">
  <div class="my-4 space-x-4">
    Email : <span class="text-gray-500">${client.email}</span>
  </div>
  <hr class="my-4">
  <div class="my-4 space-x-4">
    Address: <span class="text-gray-500">${client.adress}</span>
  </div>
  <hr class="my-4">
  <div class="my-4 space-x-4">
    <span>City: <span class="text-gray-500">${client.ville}</span> </span>
    <span>Zip Code: <span class="text-gray-500">${client.code_postal}</span> </span>

  </div>
  `
  Swal.fire({
    title: 'Client Details',
    html: html,
    showCloseButton: true,
    showCancelButton: false,
    showConfirmButton: false,
  })
}




// display products in alert
const displayProductsInSweetAlert = (products) => {
  let html = ''
  products.forEach((product) => {
    html += `

    <div class="flex justify-betweeen items-center my-8">
      <div class="flex items-center gap-4">
          <img src="${product.img}" alt="" class="w-20 h-20 object-cover">
          <div class="flex flex-col">
              <h3 class="text-lg font-semibold text-gray-700">${product.name}</h3>
              <span class="text-gray-500">${product.qte} x ${product.buyPrice} DH</span>
          </div>
      </div>
  </div>

      `
  })
  Swal.fire({
    title: 'Products',
    html: html,
    showCloseButton: true,
    showCancelButton: false,
    showConfirmButton: false,
  })
}

// Filter products By Category
document.getElementsByName('category_rad').forEach((element) => {
  element.addEventListener('change', () => {
    console.log(element.value)
    const id = element.value
    console.log('http://localhost/electro-maroc/shop/category/' + id)
    $.ajax({
      url: 'http://localhost/electro-maroc/shop/category/' + id,
      type: 'GET',
      success: function (data) {
        const products = JSON.parse(data)
        displayProducts(products)
      },
    })
  })
})

// Filter products By Search
const search = document.querySelector('#shopSearch')
search.addEventListener('keyup', () => {
  const searchValue = search.value
  console.log(searchValue)
  $.ajax({
    url: 'http://localhost/electro-maroc/shop/search/' + searchValue,
    type: 'GET',
    success: function (data) {
      const products = JSON.parse(data)
      displayProducts(products)
    },
  })
})

// Filter products By Sort
const sort = document.querySelector('#shopSort')
sort.addEventListener('change', () => {
  const sortValue = sort.value
  console.log(sortValue)
  $.ajax({
    url: 'http://localhost/electro-maroc/shop/sort/' + sortValue,
    type: 'GET',
    success: function (data) {
      const products = JSON.parse(data)
      displayProducts(products)
    },
  })
})

const updateCart = (id, quantity) => {
  const data = {
    id_client: clientSession,
    id_product: id,
    qte: quantity,
  }
  $.ajax({
    url: 'http://localhost/electro-maroc/carts/update',
    type: 'POST',
    data: data,
    success: function (res) {
      console.log(res)
      const response = JSON.parse(res)
      Swal.fire({
        icon: response.status,
        title: response.message,
        timer: 1500,
      })
      getCartCount()
    },
  })
}




// Display Products function
const displayProducts = (data) => {
  const productsContainer = document.querySelector('.products-container')

  // clear products container before displaying new products
  productsContainer.innerHTML = ''

  // check if there is no products
  if (data.length == 0) {
    productsContainer.innerHTML =
      '<h1 class="text-center text-3xl text-red-500 font-semibold">No products found</h1>'
    return
  }
  data.forEach((product) => {
    const url = 'http://localhost/electro-maroc/shop/single/' + product.id
    productsContainer.innerHTML += `
        <div class="bg-white shadow rounded overflow-hidden group">
            <!-- Product img -->
            <div class="relative ">
                <img src="${
                  product.img
                }" alt="" class="w-full max-h-[200px] object-contain">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-700">
                    <a href="${url}" class="text-white text-lg w-9 h-9 rounded-full bg-primary flex justify-center items-center  hover:bg-gray-700 transition ">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="" class="text-white text-lg w-9 h-9 rounded-full bg-primary flex justify-center items-center hover:bg-gray-700 transition ">
                        <i class="far fa-heart"></i>
                    </a>
                </div>

            </div>
            <!-- End product Image -->


            <!-- Product Content -->
            <div class="pt-4 pb-3 px-4">
                <a href="<?=URLROOT?>/shop/single/${product.id}">
                    <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition">${product.name.slice(
                      0,
                      10
                    )} ...</h4>
                </a>
                <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                    <p class="text-xl font-semibold text-primary">${
                      product.buyPrice
                    }DH</p>
                    <p class="text-sm text-gray-400 line-through">${
                      product.finalPrice
                    } DH</p>

                </div>

                <button href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b" onclick="addToCart(${
                  product.id
                })">
                    <i class="fas fa-shopping-bag mr-2"></i>
                    Add to cart
                </button>
            </div>
            <!-- End Product Content -->

        </div>
        
        `
  })
}
