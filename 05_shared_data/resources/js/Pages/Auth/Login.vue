<script setup>
import { Form } from '@inertiajs/vue3';


</script>

<template>
    <!-- sample 3: New register form -->
    <Form resetOnSuccess action="/login" method="POST" class="flex flex-col gap-4 max-w-md mx-auto mt-10" #default="{
        errors,
        processing,
        wasSuccessful

    }" :resetOnError="['password']">


        <label class="block mb-2" for="email">Email:</label>
        <input class="border py-2 px-3" type="email" name="email" />
        <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>

        <label class="block mb-2" for="password">Password:</label>
        <input class="border py-2 px-3" type="password" name="password" />
        <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>

        <div class="flex justify-start">
            <input type="checkbox" id="remember" name="remember" />
            <label for="remember" class="ml-2 text-gray-700">Remember Me</label>
        </div>

        <button :disabled="processing" class="bg-amber-400 rounded shadow px-4 py-2" type="submit">
            {{ processing ? 'Creating...' : 'Login' }}
        </button>
        <p v-if="wasSuccessful" class="mt-4 text-md text-bold text-green-500">User Login successfully! </p>

    </Form>
</template>