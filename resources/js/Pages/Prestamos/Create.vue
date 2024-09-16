<template>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg text-center">
      <h1 class="text-2xl font-bold sm:text-3xl">Registro de Préstamos</h1>

      <p class="mt-4 text-gray-500">
        Los libros son un recurso imprescindible para su proceso formativo, les permiten imaginar, descubrir, viajar y
        conocer sobre el mundo que los rodea.
      </p>
    </div>

    <form @submit.prevent="submitForm" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
      <div class="relative">
        <input v-model="nombre" type="text" id="nombre"
          class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 peer"
          placeholder=" " />
        <label for="nombre"
          class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
          Nombre
        </label>
      </div>

      <div class="relative">
        <input v-model="book.title" type="text" id="libro"
          class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 peer"
          placeholder=" " />
        <label for="libro"
          class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
          Libro a pedir
        </label>
      </div>

      <div class="flex gap-2">
        <div class="relative">
          <input v-model="fecha" type="date" id="fecha"
            class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 peer"
            placeholder=" " />
          <label for="fecha"
            class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
            Fecha de Prestamo
          </label>
        </div>

        <div class="relative">
          <input v-model="dias" type="number" id="dias"
            class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 peer"
            placeholder=" " />
          <label for="dias"
            class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
            Cantidad de Días a pedir
          </label>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <button type="submit" class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
          Registrar
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue';

const props = defineProps({
  book: Object
});

const nombre = '';
const fecha = '';
const dias = '';

</script>
