export const PI = 3.14159265359;

export function add(a, b) {
    return a + b;
}

export class Circle {
    constructor(radius) {
        this.radius = radius;
    }

    getArea() {
        return PI * this.radius * this.radius;
    }
}