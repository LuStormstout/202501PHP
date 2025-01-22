// JavaScript 中的数组的一些方法
// const array1 = [
//     {id: 1, name: "mac", price: 10, quantity: 1},
//     {id: 2, name: "iphone", price: 20, quantity: 1},
//     {id: 3, name: "ipad", price: 30, quantity: 1}
// ];

// let array = [10, 20, 30, 40, 50];

// const found = array1.find((element) => element.id === 1);
// array1.push({id: 4, name: "新的", price: 10, quantity: 1});

// array1.forEach((element) => {
//     console.log(element.name);
//     alert(1);
// });

// newArray = array1.filter((element) => element.id !== 1);
// console.log(newArray);

// console.log(found);
// console.log(array1);

// ----------------------- 以上是讲解之前没有见过的方法 -----------------------

let productList = document.getElementById('product-list'); // 商品列表
let cartItems = document.getElementById('cart-items'); // 购物车列表
let totalPriceElement = document.getElementById('total-price'); // 购物车总价

let cart = []; // 用于存储购物车商品的数组

productList.addEventListener('click', (event) => {
    // 检查点击的是否是“添加到购物车”按钮
    if (event.target.classList.contains('add-to-cart')) {
        // .closest() 方法返回的是匹配选择器的第一个祖先元素
        let product = event.target.closest('.product'); // 获取商品元素
        // .dataset 可以获取元素的 data-* 属性
        let productId = product.dataset.id; // 获取商品 ID
        let productName = product.dataset.name // 获取商品名称
        let productPrice = product.dataset.price // 获取商品价格

        let existingProduct = cart.find((item) => item.id === productId); // 查找购物车中是否已经有该商品
        if (existingProduct) {
            existingProduct.quantity++; // 如果有则增加商品数量
        } else {
            cart.push({id: productId, name: productName, price: productPrice, quantity: 1}); // 如果没有则添加商品到购物车
        }

        renderCart(); // 渲染购物车
    }
});

/**
 * 渲染购物车
 */
function renderCart() {
    cartItems.innerHTML = ''; // 清空购物车列表
    let total = 0; // 总价

    cart.forEach((item) => {
        let li = document.createElement('li');
        li.innerHTML = `${item.name} x ${item.quantity} - ¥${item.price * item.quantity}<button class="remove" data-id="${item.id}">移除</button>`;
        cartItems.appendChild(li); // 添加商品到购物车列表
        // += 相当于 total = total + item.price * item.quantity
        total += item.price * item.quantity; // 计算总价
    }); // 遍历购物车商品

    // .toFixed() 方法可把 Number 四舍五入为指定小数位数的数字
    // .toFixed(2) 表示保留两位小数, 如 1.00
    totalPriceElement.textContent = `总价：¥${total.toFixed(2)}`; // 更新总价
}

// 移除购物车商品
cartItems.addEventListener('click', (event) => {
    if (event.target.classList.contains('remove')) {
        let productId = event.target.dataset.id; // 获取商品 ID
        cart = cart.filter((item) => item.id !== productId); // 过滤掉要移除的商品
        renderCart(); // 渲染购物车
    }
});