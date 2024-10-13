// notifications.js
import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useNotificationsStore = defineStore('notifications', () => {
    const notifications = ref([])

    const unreadNotificationsCount = computed(() => {
      return notifications.value.filter(notification => notification.read_at === null).length
    })

    const fetchNotifications = async () => {
        try {
          const response = await axios.get(route('api.notifications'))
          notifications.value = response.data.data
        //   console.log('Fetched notifications:', response.data.data) // Check the response data here
        } catch (error) {
          console.error('Error fetching notifications:', error)
        }
      }


    return {
      notifications,
      unreadNotificationsCount,
      fetchNotifications,
    }
  })
