<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      Dashboard
    </template>

  <div>
    <p>Bienvenido, {{ user.name }}</p>

    <div v-if="role === 'admin'">
      <h1>Amdinistrador</h1>
    </div>

    <div v-else>
      <h1>Usuario Normal</h1>
    </div>
  </div>


  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  role: String,
  user: Object,
});
</script>
