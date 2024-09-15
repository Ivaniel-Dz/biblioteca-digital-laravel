<script setup>
import Header from './Header.vue';
import Footer from './Footer.vue';

const props = defineProps({
  book: Object
});
</script>

<template>
  <!-- Menu -->
  <Header />

  <section class="dark:bg-color-dark dark:text-color-txt-dark bg-color-main text-color-txt p-pdg-mobile md:p-pdg-desk">
    <h1 class="text-xl md:text-4xl font-bold mb-4">{{ book.title }}</h1>

    <div class="flex-row md:flex px-10">
      <picture class="pr-5">
        <img :src="book.covers ? `https://covers.openlibrary.org/b/id/${book.covers[0]}-L.jpg` : '/default-cover.jpg'"
          alt="Portada del libro" class="w-48 h-64 mr-8 md:w-[400px] md:h-[300px]" />
      </picture>

      <dl class="divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
          <dt class="font-semibold text-base"> Autor: </dt>
          <dd class="sm:col-span-2"> {{ book.authors[0]?.name || 'Autor no disponible' }} </dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
          <dt class="font-semibold text-base">
            Año de publicación:
          </dt>
          <dd class="sm:col-span-2">
            {{ book.first_publish_date || 'No disponible' }}
          </dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
          <dt class="font-semibold text-base">Descripción:</dt>
          <dd class="sm:col-span-2">{{ book.description || ' Descripción No disponible' }}</dd>
        </div>
      </dl>
    </div>

    <!-- Button -->
    <div class="flex px-10 md:py-3">
      <button
        class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
      <button
        class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
          viewBox="0 0 24 24">
          <path
            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
          </path>
        </svg>
      </button>
    </div>

  </section>

  <!-- Footer -->
  <Footer />

</template>
