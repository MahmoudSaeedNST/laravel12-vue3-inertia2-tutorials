<script setup>
import { computed } from 'vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const errors = computed(() => form.errors);

const submit = (e) => {
    form.submit(e.target[0].value, '/register', {
        preserveScroll: true,
        onError: () => form.reset('password', 'password_confirmation'),
        onSuccess: () => form.reset(),
    })

};


</script>

<template>
    <!-- sample 2: useForm Helper (React like Hook) register form -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Register</h1>
        <form @submit.prevent="submit" method="post">
            <input type="hidden" name="_method" value="post">
            <div class="mb-4">
                <label class="block mb-2" for="name">Name</label>
                <input v-model="form.name" class="border py-2 px-3" id="name" type="text" placeholder="Your Name">
                <div v-if="errors.name" class="text-red-400 font-bold">{{ errors.name }}</div>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="email">Email</label>
                <input v-model="form.email" class="border py-2 px-3" id="email" type="email"
                    placeholder="email@example.com">
                <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password">Password</label>
                <input v-model="form.password" class="border py-2 px-3" id="password" type="password"
                    placeholder="******************">
                <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2" for="password">Confirm Password</label>
                <input v-model="form.password_confirmation" class="border py-2 px-3" id="password_confirmation"
                    type="password" placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button :disabled="form.processing" class="bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 disabled:bg-blue-200" type="submit">
                   {{ form.processing ? 'Creating...' : 'Register' }}
                </button>
            </div>
        </form>
        <p v-if="form.wasSuccessful" class="mt-4 text-md text-green-400">User Register successfully! </p>
    </div>
</template>