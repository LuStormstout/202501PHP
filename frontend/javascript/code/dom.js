// 访问 DOM 元素
// 通过 ID 访问元素
let heading = document.getElementById('title');
console.log(heading.textContent); // 输出元素的文本内容

// 通过类名访问元素
let items = document.getElementsByClassName('item');
console.log(typeof items);
console.log(items[0].textContent);

// 通过标签名访问元素
let paragraphs = document.getElementsByTagName('p');
console.log(paragraphs[0].textContent);

// 通过选择器访问元素
// let title = document.querySelector('#title');
let button = document.querySelector('.btn');
console.log(button);
let buttons = document.querySelectorAll('.btn');
console.log(buttons.length);

// 修改 DOM 元素
// 修改文本内容
let title = document.getElementById('title');
title.textContent = 'Hello, JavaScript!';

// 修改属性
let link = document.querySelector('a');
link.setAttribute('href', 'https://www.youtube.com/');
link.textContent = 'YouTube';

// 修改样式
let box = document.querySelector('.box');
box.style.backgroundColor = 'lightblue';
box.style.width = '200px';
box.style.height = '200px';
box.style.border = '1px solid black';
box.style.borderRadius = '10px';
box.style.shadow = '2px 2px 2px black';
box.style.margin = '20px';
box.style.textAlign = 'center';

// box.style.cssText = 'background-color: blue; width: 200px; height: 200px; border: 1px solid black; border-radius: 10px; shadow: 2px 2px 2px black; margin: 20px;';

// 添加于移除元素
// 添加元素
let list = document.getElementById('list');
let item = document.querySelector('li');
let newItem = document.createElement('li');
newItem.textContent = 'New Item';
newItem.style.color = 'red';
list.appendChild(newItem);
// list.removeChild(item);

// !!! 大家需要去了解一下什么是 JavaScript 的原型链
// https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Function/prototype