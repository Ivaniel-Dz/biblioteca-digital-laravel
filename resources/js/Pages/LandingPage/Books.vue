<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">Libros de Ciencia Ficción</h1>
    <ul v-if="libros.length">
      <li v-for="(libro, index) in libros" :key="index" class="mb-4">
        <h2 class="text-xl font-semibold">{{ libro.title }}</h2>
        <p>Autor: {{ libro.authors[0]?.name || 'Autor no disponible' }}</p>
        <p>Año: {{ libro.first_publish_year || 'No disponible' }}</p>
      </li>
    </ul>
    <p v-else>No hay libros disponibles</p>
  </div>
</template>

<script setup>
const props = defineProps({
  libros: Array
});
</script>

<style scoped>
h1 {
  color: #333;
}
</style>
