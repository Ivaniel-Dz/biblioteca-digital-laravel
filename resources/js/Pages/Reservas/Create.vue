<template>
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Crear Reserva</h1>
    <form @submit.prevent="crearReserva">
      <div class="mb-4">
        <label for="libro" class="block text-sm font-medium text-gray-700">Libro</label>
        <select v-model="form.libro_id" id="libro" class="mt-1 block w-full border-gray-300 rounded-md">
          <option v-for="libro in libros" :key="libro.id" :value="libro.id">{{ libro.titulo }}</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="fecha_reserva" class="block text-sm font-medium text-gray-700">Fecha de Reserva</label>
        <input
          v-model="form.fecha_reserva"
          type="date"
          id="fecha_reserva"
          class="mt-1 block w-full border-gray-300 rounded-md"
        />
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Reserva</button>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const form = ref({
  libro_id: '',
  fecha_reserva: '',
})

const libros = ref([])

const fetchLibros = async () => {
  const response = await fetch('/api/libros')
  const data = await response.json()
  libros.value = data
}

const crearReserva = async () => {
  await fetch('/api/reservas', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(form.value),
  })
  // Redirige a la lista de reservas después de crear
  window.location.href = '/reservas'
}

onMounted(() => {
  fetchLibros()
})
</script>
