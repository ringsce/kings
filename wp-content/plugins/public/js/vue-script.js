document.addEventListener('DOMContentLoaded', () => {
    // Vue.js component
    new Vue({
        el: '#vue-component',
        data: {
            message: 'Hello from Vue.js in WordPress!'
        },
        methods: {
            updateMessage() {
                this.message = 'You clicked the button!';
            }
        },
        template: `
            <div>
                <p>{{ message }}</p>
                <button @click="updateMessage">Click me</button>
            </div>
        `
    });
});
