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