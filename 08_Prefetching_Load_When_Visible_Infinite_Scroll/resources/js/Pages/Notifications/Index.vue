<script setup>
import { usePoll, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const notifications = computed(() => usePage().props.notifications)

const loaidngPoll = ref(false)

const {start, stop} = usePoll(10000, {
  onStart() {
    console.log('Polling request started')
    loaidngPoll.value = true
  },
  onFinish() {
    console.log('Polling request finished')
    loaidngPoll.value = false
  }
}, {
  autoStart: false,
})

</script>
<template>
  <!-- Loading indicator for new notifications -->
  <div v-if="loaidngPoll" class="fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded shadow">
    Loading new notifications...
  </div>
  <!-- notifications controls -->
   <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-3" @click="start">Start polling</button>
    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="stop">Stop polling</button>
  <div class="p-6 bg-gray-200 rounded-lg">
    <h3 class="text-xl font-bold mb-4">🔔 Notifications (Polling helper)</h3>
    <ul class="space-y-2">
      <li v-for="n in notifications" :key="n.id" class="p-3 m-3 bg-gray-50 shadow-emerald-700 shadow rounded-3xl">
        #{{ n.id }} {{ n.title }}
      </li>
    </ul>
  </div>
</template>