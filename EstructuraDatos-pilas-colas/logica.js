

class Stack {
    constructor() {
        this.items = [];
    }

    push(element) {
        this.items.push(element);
        this.updateDisplay();
    }

    pop() {
        if (this.isEmpty()) {
            alert('Stack is empty');
            return;
        }
        this.items.pop();
        this.updateDisplay();
    }

    peek() {
        if (this.isEmpty()) {
            alert('Stack is empty');
            return;
        }
        return this.items[this.items.length - 1];
    }

    isEmpty() {
        return this.items.length === 0;
    }

    updateDisplay() {
        const stackContainer = document.getElementById('stackContainer');
        stackContainer.innerHTML = '';
        this.items.forEach(item => {
            const div = `<div class='item'> ${item} </div>`;
            stackContainer.innerHTML += div;
            
        });
    }
}

const stack = new Stack();

function pushToStack() {
    const input = document.getElementById('stackInput');
    const value = input.value.trim();
    if (value) {
        stack.push(value);
        input.value = '';
    }
}

function popFromStack() {
    stack.pop();
}


class Queue {
    constructor() {
        this.items = [];
    }

    enqueue(element) {
        this.items.push(element);
        this.updateDisplay();
    }

    dequeue() {
        if (this.isEmpty()) {
            alert('Queue is empty');
            return;
        }
        this.items.shift();
        this.updateDisplay();
    }

    front() {
        if (this.isEmpty()) {
            alert('Queue is empty');
            return;
        }
        return this.items[0];
    }

    isEmpty() {
        return this.items.length === 0;
    }

    updateDisplay() {
        const queueContainer = document.getElementById('queueContainer');
        queueContainer.innerHTML = '';
        this.items.forEach(item => {
            const div = `<div class='item'> ${item} </div>`;
            queueContainer.innerHTML += div;
            
        });
    }
    
}

const queue = new Queue();

function enqueueToQueue() {
    const input = document.getElementById('queueInput');
    const value = input.value.trim();
    if (value) {
        queue.enqueue(value);
        input.value = '';
    }
}

function dequeueFromQueue() {
    queue.dequeue();
}
