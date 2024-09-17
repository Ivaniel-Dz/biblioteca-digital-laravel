<script setup>
import { LaExternalLinkAltSolid } from '@kalimahapps/vue-icons';
import { Link } from '@inertiajs/inertia-vue3';
import Header from './Header.vue';
import Footer from './Footer.vue';

const props = defineProps({
  libros: Object,
  title: String,
});

</script>

<template>
  <Header />
  <div id="books" class="dark:bg-color-dark bg-color-main text-color-txt dark:text-color-txt-dark pt-16 px-pdg-mobile md:px-pdg-tablet">
    <h2 class="text-3xl font-bold text-center mb-8"> Libros de {{ title }} </h2>
    <ul v-if="libros.length" class="grid grid-cols-2 gap-2 md:grid-cols-4 lg:gap-6 lg:grid-cols-8 text-sm main-card">
      <li v-for="(book, index) in libros" :key="index" class="rounded-lg card">
        <div class="card-inner">
          <div class="box">
            <picture>
              <img :src="book.cover_image" alt="Portada del libro" class="w-36 h-44" />
            </picture>
            <div class="icon">
              <Link :href="route('book.show', { id: book.key.replace('/works/', '') })" class="iconBox">
              <LaExternalLinkAltSolid class="text-2xl dark:fill-black" />
              </Link>
            </div>
          </div>
        </div>
        <article>
          <h2 class="font-semibold pt-2">{{ book.title }}</h2>
          <p>Autor: {{ book.authors[0]?.name || 'Autor no disponible' }}</p>
          <p>Año: {{ book.first_publish_year || 'No disponible' }}</p>
        </article>
      </li>
    </ul>
    <p v-else>No hay libros disponibles</p>
  </div>
  <Footer />
</template>

<style scoped>
.main-card .card-inner {
  position: relative;
  width: 9rem;
  height: 11rem;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  overflow: hidden;
}

/* Posicion de Icono */
.main-card .card-inner .box .icon {
  position: absolute;
  bottom: -0.375rem;
  right: -0.375rem;
  width: 3rem;
  /* Tamaño icon */
  height: 3rem;
  /* Tamaño icon */
  background: rgb(234 179 8);
  border-top-left-radius: 50%;
}

/* Hover de Icon */
.main-card .card-inner .box .icon:hover .iconBox {
  transform: scale(1.1);
}

/* Esquina redondo abajo del icon */
.main-card .card-inner .box .icon::before {
  position: absolute;
  content: "";
  bottom: 0.375rem;
  left: -1.25rem;
  background: transparent;
  width: 1.25rem;
  height: 1.25rem;
  border-bottom-right-radius: 1.25rem;
  box-shadow: 0.313rem 0.313rem 0 0.313rem rgb(234 179 8);
}

/* Esquina redondo arriba del icon */
.main-card .card-inner .box .icon::after {
  position: absolute;
  content: "";
  top: -1.25rem;
  right: 0.375rem;
  background: transparent;
  width: 1.0rem;
  height: 1.2rem;
  border-bottom-right-radius: 1.25rem;
  box-shadow: 0.313rem 0.313rem 0 0.313rem rgb(234 179 8);
}

/* Estilo de Icono */
.main-card .card-inner .box .icon .iconBox {
  position: absolute;
  inset: 0.625rem;
  background: #fff;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.3s;
}
</style>
