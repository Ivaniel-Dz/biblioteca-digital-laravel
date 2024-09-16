<template>
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Gestión de Préstamos</h1>
    <table class="min-w-full bg-white">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">Libro</th>
          <th class="py-2 px-4 border-b">Usuario</th>
          <th class="py-2 px-4 border-b">Fecha de Préstamo</th>
          <th class="py-2 px-4 border-b">Fecha de Devolución</th>
          <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="prestamo in prestamos" :key="prestamo.id">
          <td class="py-2 px-4 border-b">{{ prestamo.libro.titulo }}</td>
          <td class="py-2 px-4 border-b">{{ prestamo.usuario.name }}</td>
          <td class="py-2 px-4 border-b">{{ prestamo.fecha_prestamo }}</td>
          <td class="py-2 px-4 border-b">
            <span v-if="prestamo.fecha_devolucion">{{ prestamo.fecha_devolucion }}</span>
            <span v-else>Pendiente</span>
          </td>
          <td class="py-2 px-4 border-b">
            <button
              v-if="!prestamo.fecha_devolucion"
              class="bg-blue-500 text-white px-4 py-2 rounded"
              @click="devolverPrestamo(prestamo.id)"
            >
              Marcar como devuelto
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const prestamos = ref([])

const fetchPrestamos = async () => {
  const response = await fetch('/api/prestamos')
  const data = await response.json()
  prestamos.value = data
}

const devolverPrestamo = async (id) => {
  await fetch(`/api/prestamos/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
  })
  fetchPrestamos()
}

onMounted(() => {
  fetchPrestamos()
})
</script>
