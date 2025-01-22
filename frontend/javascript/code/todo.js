let input = document.getElementById('todo-input');
let addButton = document.getElementById('add-btn');
let todoList = document.getElementById('todo-list');
let deleteButton = document.getElementsByClassName('delete-btn');

// 我们需要在用户点击了添加新的待办事项按钮时，将输入框中的内容添加到待办事项列表中。
addButton.addEventListener('click', () => {
    addTodoItem();
})

// 当用户按下回车键时，也需要将输入框中的内容添加到待办事项列表中。
addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        addTodoItem();
    }
})

/**
 * 将输入框中的内容添加到待办事项列表中
 * 
 * @returns {void}
 */
function addTodoItem() {
    // 获取输入框中的内容, trim() 方法用于去除字符串两端的空格
    let text = input.value.trim();
    // 如果输入框中的内容为空，则不执行任何操作
    if (text) {
        let listItem = document.createElement('li');
        listItem.textContent = text;

        // 创建一个删除按钮
        let deleteButton = document.createElement('button');
        deleteButton.textContent = '删除';
        deleteButton.className = 'delete-btn';
        // 当用户点击删除按钮时，将该待办事项从列表中删除
        deleteButton.addEventListener('click', () => {
            // 当用户点击删除按钮时，弹出一个确认框，询问用户是否要删除该待办事项。
            if (confirm('确定要删除吗？')) {
                todoList.removeChild(listItem);
            }
        });

        listItem.appendChild(deleteButton);
        todoList.appendChild(listItem);

        // 清空输入框
        input.value = '';
    } else {
        alert('请输入内容!');
    }
}