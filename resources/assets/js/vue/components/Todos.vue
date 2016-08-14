<template>

    <h1>TODOS</h1>
    <input v-model="newTodo">
    <button v-on:click="addTodo">+</button>
    <ul v-for="todo in todos">
        <li>{{todo.title}} <button v-on:click="delTodo(todo)">-</button> </li>
    </ul>

</template>

<style>
</style>

<script>
    export default{
        data(){
            return {
                todos: [
                    {title: 'a'},
                    {title: 'b'},
                ],
                newTodo: ''
            }
        },
        http: {
            root: '/api',
            headers: {
                Accept: 'application/x.someline.v1+json'
            }
        },
        ready() {
            this.get_todos();
        },
        methods: {
            get_todos(){
                this.todos = [
                    {title: 'c'},
                    {title: 'd'},
                ]
            },
            addTodo(){
                this.todos.push(
                    {title: this.newTodo}
                )
            },
            delTodo(todo){
                this.todos.$remove(todo);
            },
            editTodo(todo, title){
                todo.title = title;
            }
        }
    }
</script>