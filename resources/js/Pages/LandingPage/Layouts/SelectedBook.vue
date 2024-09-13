<script setup>
const props = defineProps({
  book: Object
});
</script>

<template>
  <div class="p-8 text-color-txt dark:text-color-txt-dark">
    <h1 class="text-4xl font-bold mb-4">{{ book.title }}</h1>

    <div class="flex items-start">
      <img :src="book.covers ? `https://covers.openlibrary.org/b/id/${book.covers[0]}-L.jpg` : '/default-cover.jpg'" alt="Portada del libro" class="w-48 h-64 mr-8"/>

      <div>
        <p class="text-xl mb-2"><strong>Autor:</strong> {{ book.authors[0]?.name || 'Autor no disponible' }}</p>
        <p class="text-xl mb-2"><strong>Año de publicación:</strong> {{ book.first_publish_date || 'No disponible' }}</p>
        <p class="text-xl"><strong>Descripción:</strong> {{ book.description || 'No disponible' }}</p>
        <p class="text-xl"><strong>Idioma:</strong> {{ book.subject_places[0] || 'No disponible' }}</p>
      </div>
    </div>
  </div>
</template>
