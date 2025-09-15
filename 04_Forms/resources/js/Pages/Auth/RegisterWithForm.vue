<script setup>
import { Form } from '@inertiajs/vue3';

const handleerror = () => {
    alert('error')
}
const handlesuccss = () => {
    alert('success')
}
const handlestart = () => {
    alert('start')
}
</script>

<template>
    <!-- sample 3: New register form -->
    <Form  resetOnSuccess
    action="/register" method="POST" class="flex flex-col gap-4 max-w-md mx-auto mt-10" #default="{
        errors,
        processing,
        wasSuccessful,
        resetAndClearErrors

    }" 

    :resetOnError="['password', 'password_confirmation']" 
    @start="handlestart"
    @success="handlesuccss"
    @error="handleerror"
    >

        <label class="block mb-2" for="name">Name:</label>
        <input class="border py-2 px-3" type="text" name="name" />
        <div v-if="errors.name" class="text-red-400 font-bold">{{ errors.name }}</div>

        <label class="block mb-2" for="email">Email:</label>
        <input class="border py-2 px-3" type="email" name="email" />
         <div v-if="errors.email" class="text-red-400 font-bold">{{ errors.email }}</div>

        <label class="block mb-2" for="password">Password:</label>
        <input class="border py-2 px-3" type="password" name="password" />
         <div v-if="errors.password" class="text-red-400 font-bold">{{ errors.password }}</div>

        <label class="block mb-2" for="password_confirmation">Confirm Password:</label>
        <input class="border py-2 px-3" type="password" name="password_confirmation" />


        <button :disabled="processing" class="bg-amber-400 rounded shadow px-4 py-2" type="submit">
            {{ processing ? 'Creating...' : 'Register' }}
        </button>
        <p v-if="wasSuccessful" class="mt-4 text-md text-bold text-green-500">User Register successfully! </p>

        <button @click="resetAndClearErrors()" class="bg-blue-400 hover:to-blue-800 rounded shadow px-4 py-2" type="button"> reset </button>

    </Form>
</template>