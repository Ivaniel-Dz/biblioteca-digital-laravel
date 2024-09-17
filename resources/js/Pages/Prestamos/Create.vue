<template>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg text-center">
      <h1 class="text-2xl font-bold sm:text-3xl">
        Registro de Préstamos
      </h1>

      <p class="mt-4 text-gray-500">
        Los libros son un recurso imprescindible para su proceso
        formativo, les permiten imaginar, descubrir, viajar y conocer
        sobre el mundo que los rodea.
      </p>
    </div>

    <form @submit.prevent="submitForm" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
      <input type="hidden" name="_token" :value="csrfToken" />
      <div class="relative">
        <h3 id="libro" class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm">
          {{ book.title }}
        </h3>

        <label for="libro"
          class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
          Libro a pedir
        </label>
      </div>

      <div class="relative">
        <input v-model="form.fecha_prestamo" type="date" id="fecha"
          class="w-full rounded-lg border-gray-200 p-4 pt-6 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 peer"
          placeholder=" " />
        <label for="fecha"
          class="absolute left-3 -top-2 text-sm text-gray-500 bg-white px-1 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:left-4 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-3 peer-focus:text-blue-500">
          Fecha de Prestamo
        </label>
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
import { reactive, ref, onMounted } from "vue";

const props = defineProps({
  book: Object,
});

const form = reactive({
  libro_id: props.book.key.replace("/works/", "").replace(/\D/g, ""),
  fecha_prestamo: "",
});

let csrfToken = ref("");

// Obtenemos el token CSRF desde el DOM en el hook onMounted
onMounted(() => {
  csrfToken.value = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
});

async function submitForm() {
  try {
    const response = await fetch("/prestamos", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken.value,
      },
      body: JSON.stringify(form),
    });

    // Verifica si la respuesta es correcta
    if (!response.ok) {
      // Si no es 200, lanza error
      throw new Error(`Error: ${response.status} ${response.statusText}`);
    }

    // Si la respuesta es correcta, intenta convertir a JSON
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error("Error al enviar el formulario:", error);
  }
}
</script>
