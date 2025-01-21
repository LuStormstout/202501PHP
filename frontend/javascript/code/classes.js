let person = {
    name: '张三',
    age: 25,
    greet: function () {
        // this 指向当前对象
        // this.name 指向当前对象(person 对象)的 name 属性
        console.log('Hello, my name is ' + this.name);
    }
};

console.log(person.name); // 张三
person.greet(); // Hello, my name is 张三

function Human(name, age) {
    this.name = name;
    this.age = age;
}

console.log(typeof Human); // function

// 创建一个 Human 对象, 并赋值给 student 变量, student 是一个对象
let student = new Human('李四', 20);
console.log(typeof student); // object
console.log(student.name); // 李四

// 类与继承
// 定义类, 使用 class 关键字, 类名首字母大写
class Animal {
    // 构造函数, 用于初始化对象
    constructor(name) {
        this.name = name;
    }

    speak() {
        console.log(this.name + ' makes a noise.');
    }

    run() {
        console.log(this.name + ' is running.');
    }
}

// 创建一个 Animal 对象, 并赋值给 dog 变量, dog 是一个对象
let dog = new Animal('Dog');
dog.speak(); // Dog makes a noise.
dog.run(); // Dog is running.

// 继承
class Cat extends Animal {

    // 构造函数, 用于初始化对象
    constructor(name) {
        // 调用父类的构造函数
        // super() 用于调用父类的构造函数
        super(name);

        // 子类自己的属性
        this.type = 'Cat';
    }

    speak() {
        console.log(this.name + ' makes a noise, Meow Meow.');
    }
}

// 创建一个 Cat 对象, 并赋值给 cat 变量, cat 是一个对象
let cat = new Cat('Cat');
cat.speak(); // Cat makes a noise.

// 异步操作, JavaScript 的异步操作是其强大功能之一，常用于处理耗时任务（如网络请求）。
// 异步操作的特点是不会阻塞主线程，而是在任务完成后执行回调函数。
// 回调函数
function fetchData(callback) {
    setTimeout(function () {
        // 模拟数据加载, 2 秒后执行回调函数
        // 这里会先执行 console.log("数据加载完成") 再执行 callback('Data fetched!');
        console.log("数据加载完成");
        callback('Data fetched!');
    }, 2000);
}

fetchData((data) => {
    console.log(data);
})

// Promise
// Promise 是异步编程的一种解决方案，比传统的回调函数和事件更强大、更合理。
let promise = new Promise((resolve, reject) => {
    // 模拟数据加载, 加载成功后执行 success 会得到 true, 否则得到 false
    // let success = 「网络请求, 请求成功返回 true ... 」;
    let success = false;
    if (success) {
        resolve('Data fetched!');
    } else {
        reject('Error!');
    }
});

promise.then((message) => {
    console.log("success: " + message);
}).catch((message) => {
    console.log("fail: " + message);
});

// async/await
// async/await 是异步编程的一种解决方案，基于 Promise 实现。
function fetchData() {
    return new Promise((resolve) => {
        setTimeout(function () {
            // 模拟数据加载, 2 秒后执行 resolve('Data fetched!');
            console.log("Data fetched!");
            resolve('Data fetched!');
        }, 2000);
    });
}

// async 用于定义一个异步函数
// await 用于等待一个 Promise 对象
async function fetchDataAsync() {
    console.log("Fetching data...");
    let data = await fetchData();
    console.log(data); // Data fetched!
}

fetchDataAsync();