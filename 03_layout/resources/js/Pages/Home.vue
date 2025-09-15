<script setup>
import DashboardLayout from './DashboardLayout.vue';


defineOptions({
    layout: DashboardLayout
})
defineProps({
    // Define your component props here
})


</script>

<template>

    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Welcome to the Home Page</h1>
        <p class="text-lg text-gray-700">This is a simple Vue component rendered with Inertia.js.</p>
    </div>

</template>