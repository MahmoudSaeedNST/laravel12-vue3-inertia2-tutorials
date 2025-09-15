<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-indigo-400 shadow mb-8">
            <div class="container mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <Link href="/" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500" exact>
                        Home
                        </Link>
                        <Link href="/about" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500">
                        About
                        </Link>
                        <Link href="/users" class="py-5 px-3 text-white hover:text-gray-700"
                            active-class="font-bold border-b-2 border-blue-500">
                        Users
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