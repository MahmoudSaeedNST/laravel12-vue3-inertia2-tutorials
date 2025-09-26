<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';

const notifications = computed ( () => usePage().props.notifications || []);
const othernotifications = ref(1);
onMounted(() => {

  setInterval(() => {
    console.log('Polling for new notifications...', othernotifications.value++);
    router.reload({ data: {newnotifications: othernotifications.value}, only: ['notifications'] });
  }, 10000); // refresh every 10s
});
</script>

<template>
  <div class="p-6 bg-gray-200 rounded-lg">
    <h3 class="text-xl font-bold mb-4">🔔 Notifications</h3>
    <ul class="space-y-2">
      <li v-for="n in notifications" :key="n.id" class="p-3 m-3 bg-gray-50 shadow-emerald-700 shadow rounded-3xl">
        #{{n.id}} {{ n.title }}
      </li>
    </ul>
  </div>
</template>