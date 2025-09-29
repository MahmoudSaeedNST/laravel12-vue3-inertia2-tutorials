<script setup>
import { Deferred } from '@inertiajs/vue3'

</script>

<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $page.props.title }}</h1>
        <h3>Welcome, {{ $page.props.user.name }}</h3>
    </div>

    <!-- Deferred Posts -->
    <Deferred data="posts">
        <template #fallback>
            <div>Loading...</div>
        </template>
        <section>
            <div class="max-w-4xl mx-auto p-6">
                <h3 class="text-3xl font-bold mb-6">Posts</h3>
                <ul class="space-y-2">
                    <li v-for="post in $page.props.posts" :key="post.id"
                        class="bg-violet-600 hover:bg-violet-900 text-white p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                        {{ post.title }}
                    </li>
                </ul>

            </div>
        </section>
    </Deferred>
    <!-- Deferred Todos -->

    <section>
        <div class="max-w-4xl mx-auto p-6">
            <h3 class="text-3xl font-bold mb-6">Todos</h3>
            <ul v-if="$page.props.todos" class="space-y-2">
                <li v-for="todo in $page.props.todos" :key="todo.id"
                    class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    {{ todo.title }}
                    <strong>{{ todo.completed ? "✅" : "❌" }}</strong>
                </li>
            </ul>
            <p v-else>Loading Todos...</p>
        </div>
    </section>

    

</template>
