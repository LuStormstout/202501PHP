let timer = document.getElementById('timer');
let startButton = document.getElementById('start');
let stopButton = document.getElementById('stop');
let resetButton = document.getElementById('reset');

let count = 0;
let interval;

startButton.addEventListener('click', () => {
    if (!interval) {
        interval = setInterval(() => {
            count++;
            timer.textContent = count;
            // timer.innerHTML = count;
        }, 1000)
    }
});

stopButton.addEventListener('click', () => {
    clearInterval(interval);
    interval = null;
});

resetButton.addEventListener('click', () => {
    clearInterval(interval);
    interval = null;
    count = 0;
    timer.innerHTML = count;
});

// 额外作业
// 阅读 setTimeout() 和 setInterval() 以及 clearInterval() 的文档，了解它们的用法和区别。
// https://developer.mozilla.org/zh-CN/docs/Web/API/WindowTimers/setTimeout
// https://developer.mozilla.org/zh-CN/docs/Web/API/WindowTimers/setInterval
// https://developer.mozilla.org/zh-CN/docs/Web/API/WindowTimers/clearInterval
// 使用 setTimeout() 自己实现一个好玩儿的东西