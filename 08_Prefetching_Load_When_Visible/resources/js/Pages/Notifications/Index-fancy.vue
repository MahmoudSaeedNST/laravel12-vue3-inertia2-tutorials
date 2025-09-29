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
  <div class="max-w-4xl mx-auto p-6 bg-white">
    <!-- Header -->
    <div class="mb-6">
      <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
        <span class="text-blue-500">🔔</span>
        Notifications
      </h3>
      <p class="text-gray-600 mt-1">Stay updated with your latest notifications</p>
    </div>

    <!-- Notifications List -->
    <div class="space-y-3">
      <div 
        v-for="n in notifications" 
        :key="n.id"
        class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:bg-blue-50 hover:border-blue-200 transition-colors duration-200"
      >
        <div class="flex items-start gap-3">
          <!-- Notification Icon -->
          <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
          
          <!-- Notification Content -->
          <div class="flex-grow">
            <div class="flex items-center gap-2">
              <span class="text-xs text-gray-500 font-medium bg-gray-200 px-2 py-1 rounded-full">
                #{{ n.id }}
              </span>
            </div>
            <p class="text-gray-800 font-medium mt-1">{{ n.title }}</p>
          </div>
        </div>
      </div>
      
      <!-- Empty State -->
      <div v-if="notifications.length === 0" class="text-center py-12">
        <div class="text-gray-400 text-6xl mb-4">📭</div>
        <h4 class="text-gray-500 font-medium">No notifications yet</h4>
        <p class="text-gray-400 text-sm mt-1">New notifications will appear here</p>
      </div>
    </div>
  </div>
</template>