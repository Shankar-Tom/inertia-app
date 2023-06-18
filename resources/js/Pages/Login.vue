
<template>
  <va-form ref="myForm" class="flex flex-col gap-2">
    <va-progress-bar v-show="isLoading" indeterminate />

    <va-input stateful label="Name" :rules="[(v) => !!v || 'Required']" />

    <va-input stateful label="Phone" :rules="[asyncRule, (v) => !!v || 'Required']" />

    <va-button :loading="isLoading" :disabled="isLoading || !isValid">Send</va-button>
  </va-form>
</template>


<script>
import { useForm } from '@inertiajs/vue3';

export default {
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    handleSubmit() {
      alert("-- form submit --");
    },
  },
};
</script>
