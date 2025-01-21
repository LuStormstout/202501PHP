// 错误处理
// try ... catch 语句 用于处理异常
try {
    // 这个地方可能是一个网络请求, 也可能是一个计算, 也可能是一个函数调用, 等等...
    let result = new 10 / 0;
    console.log("结果：" + result);

    // 假设这里是执行保存数据到数据库的操作, 执行失败了, 
    // 我们可以在 catch 尝试解决这个问题, 比如说暂时改为保存到本地存储或者是 redis 缓存
    // 还有就是我们其实会在 catch 里面记录错误日志, 并且回滚操作
} catch (error) {
    console.error("「try...catch」发生错误：" + error.message);
    // console.error("抱歉，发生了一个错误，请稍后再试。");
}

// throw 语句 用于抛出异常
function divide(a, b) {
    if (b === 0) {
        throw new Error("除数不能为 0");
    }
    return a / b;
}
try {
    let result = divide(10, 0);
    // let result = divide(10, 2);
    console.log("结果：" + result);
} catch (error) {
    console.error("「throw」发生错误：" + error.message);
}

// finally 语句 用于在 try 和 catch 之后执行代码
// 无论是否发生异常，finally 块都会执行
try {
    console.log("开始计算...");
    let result = new 10 / 2;
    console.log("结果：" + result);
} catch (error) {
    console.error("「try...catch...finally」发生错误：" + error.message);
} finally {
    console.log("「try...catch...finally」结束计算...");
}