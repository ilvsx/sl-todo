<template>

    <h1>TODOS</h1>
    <input v-model="newTodo">
    <button v-on:click="addTodo">+</button>
    <ul v-for="todo in todos">
        <li>{{todo.title}}
            <button v-on:click="delTodo(todo)">-</button>
        </li>
    </ul>

</template>

<style>
</style>

<script>
    export default{
        data(){
            return {
                todos: [
                    {id: 1, title: 'a'},
                    {id: 2, title: 'b'},
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
                var resource = this.$resource('todos', {});

                resource.get().then(function (response) {
                    this.$set('todos', response.data.data);
                });
            },
            addTodo(){
                var resource = this.$resource('todos', {});

                resource.save({title: this.newTodo}).then(function (response) {
                    this.todos.push(response.data.data);
                });
            },
            delTodo(todo){
                var resource = this.$resource('todos{/id}', {});

                resource.delete({id: todo.id}).then(function () {
                    this.todos.$remove(todo);
                });
            },
            editTodo(todo, title){
                todo.title = title;
            }
        }
    }
</script>