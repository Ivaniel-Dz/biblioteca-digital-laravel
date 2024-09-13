<template>
  <div id="books" class="text-color-txt dark:text-color-txt-dark pt-8 px-pdg-mobile md:px-pdg-tablet">
    <h2 class="text-3xl font-bold text-center mb-8">Libros Populares </h2>
    <ul v-if="libros.length" class="grid grid-cols-2 gap-2 md:grid-cols-4 lg:gap-6 lg:grid-cols-8 text-sm">
      <li v-for="(libro, index) in libros" :key="index" class="rounded-lg">
        <picture>
          <img :src="libro.cover_image" alt="Portada del libro" class="w-36 h-44" />
        </picture>
        <h2 class="font-semibold pt-2">{{ libro.title }}</h2>
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

<style scoped></style>
