<template>
  <div>
    <h1>Libros de Open Library</h1>

    <!-- Formulario de búsqueda -->
    <form @submit.prevent="buscarLibros">
      <input v-model="localSearchQuery" placeholder="Buscar libros..." />
      <button type="submit">Buscar</button>
    </form>

    <div v-if="error">
      <p>{{ error }}</p>
    </div>
    
    <div v-else>
      <div v-if="books.length">
        <ul>
          <li v-for="book in books" :key="book.isbn">
            <h2>{{ book.title }}</h2>
            <p>Autor: {{ book.author }}</p>
            <p>Año: {{ book.published_year }}</p>
            <p>ISBN: {{ book.isbn }}</p>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>No se encontraron libros para "{{ localSearchQuery }}".</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    books: Array,
    error: String,
    searchQuery: String
  },
  data() {
    return {
      localSearchQuery: this.searchQuery
    };
  },
  watch: {
    // Escuchar los cambios en searchQuery y actualizar el valor local
    searchQuery(newValue) {
      this.localSearchQuery = newValue;
    }
  },
  methods: {
    buscarLibros() {
      // Emitir el evento para actualizar el valor en el componente padre
      this.$emit('update:searchQuery', this.localSearchQuery);
      this.$inertia.get('/books', { q: this.localSearchQuery });
    }
  }
}
</script>
