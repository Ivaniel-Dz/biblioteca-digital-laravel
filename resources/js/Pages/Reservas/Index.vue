<template>
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Gestión de Reservas</h1>
    <table class="min-w-full bg-white">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">Libro</th>
          <th class="py-2 px-4 border-b">Usuario</th>
          <th class="py-2 px-4 border-b">Fecha de Reserva</th>
          <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="reserva in reservas" :key="reserva.id">
          <td class="py-2 px-4 border-b">{{ reserva.libro.titulo }}</td>
          <td class="py-2 px-4 border-b">{{ reserva.usuario.name }}</td>
          <td class="py-2 px-4 border-b">{{ reserva.fecha_reserva }}</td>
          <td class="py-2 px-4 border-b">
            <button
              class="bg-red-500 text-white px-4 py-2 rounded"
              @click="cancelarReserva(reserva.id)"
            >
              Cancelar Reserva
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const reservas = ref([])

const fetchReservas = async () => {
  const response = await fetch('/api/reservas')
  const data = await response.json()
  reservas.value = data
}

const cancelarReserva = async (id) => {
  await fetch(`/api/reservas/${id}`, {
    method: 'DELETE',
    headers: { 'Content-Type': 'application/json' },
  })
  fetchReservas()
}

onMounted(() => {
  fetchReservas()
})
</script>
