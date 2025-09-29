<script setup>
import { Deferred, WhenVisible } from '@inertiajs/vue3'

</script>

<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $page.props.title }}</h1>
        <h3>Welcome, {{ $page.props.user.name }}</h3>
    </div>

    <!-- <section>
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
    </section> -->


    <!-- load when visible Posts -->


    <section>
        <div class="max-w-4xl mx-auto p-6">
            <h3 class="text-3xl font-bold mb-6">Posts</h3>
            <ul class="space-y-2">
                <li v-for="post in $page.props.posts" :key="post.id">
                    <!-- post card -->
                    <div class="p-3 m-3 bg-gray-50 shadow-blue-700 shadow rounded-3xl">
                        <WhenVisible :buffer="100" data="posts" class="text-sm text-gray-500 mb-2">
                            <template #fallback>
                                Loading post #{{ post.id }}...
                            </template>
                            #{{ post.id }}
                            <h4 class="text-lg font-bold">{{ post.title }}</h4>
                            <p class="mt-2">{{ post.body }}</p>
                        </WhenVisible>
                    </div>
                </li>
            </ul>

        </div>
    </section>


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



    <!-- load when visible -->
    <div class="p-6 bg-gray-200 rounded-lg">
        <h3 class="text-xl font-bold mb-4">🔔 Notifications (Polling helper)</h3>
        <ul class="space-y-2">
            <li v-for="n in $page.props.notifications" :key="n.id"
                class="p-3 m-3 bg-gray-50 shadow-emerald-700 shadow rounded-3xl">
                #{{ n.id }} {{ n.title }}
            </li>
        </ul>
    </div>

</template>
