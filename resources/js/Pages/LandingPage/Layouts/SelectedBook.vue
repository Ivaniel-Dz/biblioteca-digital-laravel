<script setup>
import { AkHeart, BsBookmarkPlus } from '@kalimahapps/vue-icons';
import PrimaryButton from '../Components/PrimaryButton.vue';
import SecondaryButton from '../Components/SecondaryButton.vue';
import IconButton from '../Components/IconButton.vue';
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
      <!-- Tabla -->
      <dl class="divide-gray-100 text-sm">

        <picture class="pr-5 w-full h-full">
          <img :src="book.covers ? `https://covers.openlibrary.org/b/id/${book.covers[0]}-L.jpg` : '/default-cover.jpg'"
            alt="Portada del libro" class="w-48 h-64 md:w-[230px] md:h-[300px]" />
        </picture>

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

    <!-- Botones -->
    <div class="flex px-10 md:py-3 gap-4">
      <PrimaryButton :href="route('prestamos.create', { id: book.key.replace('/works/', '').replace(/\D/g, '') })" > Prestamo </PrimaryButton>
      <SecondaryButton :href="route('reservas.create', { id: book.key.replace('/works/', '').replace(/\D/g, '') })" > Reservar </SecondaryButton>
      <IconButton> <BsBookmarkPlus/> </IconButton>
      <IconButton> <AkHeart/> </IconButton>
    </div>

  </section>

  <!-- Footer -->
  <Footer />

</template>
