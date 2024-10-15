import { defineStore } from 'pinia'
import { ref } from 'vue'
import throttle from 'lodash.throttle'

export const useGlobalSearchStore = defineStore('global_search', () => {
    const results = ref([])


    const fetchResults = throttle(async (query) => {
        try {
          const response = await axios.post(route('search.results'), {search: query})
          results.value = response.data.data;
          console.log(response.data.data);
        } catch (error) {
          console.error('Error fetching search results:', error)
        }
      }, 300);

    const clearResults = () => {
      results.value = []
    }


    return {
     results,
     fetchResults,
     clearResults
    }
  })
