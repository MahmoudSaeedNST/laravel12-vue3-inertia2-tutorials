<script setup>
defineProps({
    username: String,
})
</script>

<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">User Profile</h1>
        <p class="text-lg text-gray-700">Welcome, {{ username }}!</p>
    </div>
</template>