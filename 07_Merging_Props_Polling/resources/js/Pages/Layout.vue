<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow mb-8">
            <div class="container mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <Link href="/" class="py-5 px-3 text-gray-700 hover:text-gray-900 hover:shadow">
                        Home
                        </Link>
                        <Link href="/about" class="py-5 px-3 text-gray-700 hover:text-gray-900 hover:shadow">
                        About
                        </Link>
                        <Link href="/users" class="py-5 px-3 text-gray-700 hover:text-gray-900 hover:shadow">
                        Users
                        </Link>
                        <Link href="/posts" class="py-5 px-3 text-gray-700 hover:text-gray-900 hover:shadow">
                        Posts
                        </Link>
                        <Link href="/dashboard" class="py-5 px-3 text-gray-700 hover:text-gray-900 hover:shadow">
                        Todos
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto px-4">
            <slot />
        </main>
    </div>
</template>