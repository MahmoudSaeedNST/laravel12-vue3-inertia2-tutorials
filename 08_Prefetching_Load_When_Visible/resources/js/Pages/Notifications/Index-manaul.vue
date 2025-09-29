<script setup>
import { router , usePage } from '@inertiajs/vue3'
import { onMounted, ref, computed } from 'vue'

const notifications = computed(() => usePage().props.notifications)

const notificationCouter = ref(1)

onMounted(() => {
    setInterval(() => {
        notificationCouter.value++
        router.reload({ 
            only: ['notifications'],
            data: { newnotifications: notificationCouter.value }
        })
    }, 5000);
})

</script>
<template>
  <div class="p-6 bg-gray-200 rounded-lg">
    <h3 class="text-xl font-bold mb-4">🔔 Notifications (Manual Polling)</h3>
    <ul class="space-y-2">
      <li v-for="n in notifications" :key="n.id" class="p-3 m-3 bg-gray-50 shadow-emerald-700 shadow rounded-3xl">
        #{{n.id}} {{ n.title }}
      </li>
    </ul>
  </div>
</template>