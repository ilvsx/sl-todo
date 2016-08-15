<template>

    <h1>Todos</h1>
    <input v-model="newTodo">
    <button v-on:click="addTodo">+</button>
    <ul v-for="todo in undoneTodos">
        <li>{{todo.title}}
            <button v-on:click="delTodo(todo)">Del</button>
            <button v-on:click="doneTodo(todo)">Done</button>
        </li>
    </ul>

    <hr>

    <h1>Done Todos</h1>
    <ul v-for="todo in doneTodos">
        <li>{{todo.title}}
            <button v-on:click="delTodo(todo)">Del</button>
        </li>
    </ul>

</template>

<style>
</style>

<script>
    export default{
        data(){
            return {
                undoneTodos: [
                    {id: 1, title: 'a'},
                    {id: 2, title: 'b'},
                ],
                doneTodos: [
                    {id: 3, title: 'c'},
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
            this.getUndoneTodos();
            this.getDoneTodos();
        },
        methods: {
            getUndoneTodos(is_done){
                var resource = this.$resource('todos' + '?search=is_done:0', {});

                resource.get().then(function (response) {
                    this.$set('undoneTodos', response.data.data);
                });
            },
            getDoneTodos(){
                var resource = this.$resource('todos' + '?search=is_done:1', {});

                resource.get().then(function (response) {
                    this.$set('doneTodos', response.data.data);
                });
            },
            addTodo(){
                var resource = this.$resource('todos', {});

                resource.save({title: this.newTodo}).then(function (response) {
                    this.undoneTodos.push(response.data.data);
                });
            },
            delTodo(todo){
                var resource = this.$resource('todos{/id}', {});

                resource.delete({id: todo.id}).then(function () {
                    this.undoneTodos.$remove(todo);
                    this.doneTodos.$remove(todo);
                });
            },
            doneTodo(todo){
                var resource = this.$resource('todos{/id}', {});

                resource.update({id: todo.id}, {is_done: 1}).then(function () {
                    this.undoneTodos.$remove(todo);
                    this.doneTodos.push(todo);
                });
            }
        }
    }
</script>