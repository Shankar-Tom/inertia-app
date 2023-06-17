<template>
   <va-alert
    color="warning"
    class="mb-6"
  >
    Your account is about expire, upgrade now
  </va-alert>
 
  <va-button @click="showModal = !showModal">
    Show modal (default)
  </va-button>
  <va-modal
    v-model="showModal"
    title="Overview"
     blur
  />

</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    components:{
        Link
    },
   
    data(){
        return {
      showModal: false,
    };
    }
}
</script>