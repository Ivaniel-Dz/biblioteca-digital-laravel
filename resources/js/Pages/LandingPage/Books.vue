<template>
  <div>
    <h1>Libros</h1>
    <div v-if="errorMessage">{{ errorMessage }}</div>
    <ul v-else>
      <li v-for="book in books" :key="book.id">
        <strong>{{ book.volumeInfo.title }}</strong><br>
        Autor(es): {{ book.volumeInfo.authors ? book.volumeInfo.authors.join(', ') : 'Desconocido' }}<br>
        Fecha de publicación: {{ book.volumeInfo.publishedDate || 'Desconocida' }}<br>
        <a :href="book.volumeInfo.infoLink" target="_blank">Más información</a>
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  name: 'BookList',
  setup() {
    const books = ref([]);
    const errorMessage = ref('');

    const fetchBooks = async () => {
      try {
        const response = await axios.get('/api/buscarLibros', {
          params: {
            query: 'harry potter', // Puedes hacer que esto sea dinámico si es necesario
          },
        });
        books.value = response.data.items || [];
      } catch (error) {
        errorMessage.value = 'No se encontraron libros.';
        console.error(error);
      }
    };

    onMounted(fetchBooks);

    return {
      books,
      errorMessage,
    };
  },
};
</script>

<style scoped>
/* Agrega estilos específicos para este componente aquí */
</style>
