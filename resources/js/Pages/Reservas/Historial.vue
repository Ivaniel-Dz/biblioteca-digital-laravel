<template>

  <Head title="Prestamo" />

  <AuthenticatedLayout>
    <template #header>
      Historial de Reservas de Libros
    </template>

    <div class="rounded-lg border border-gray-200">
      <div class="overflow-x-auto rounded-t-lg">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
          <thead class="text-left">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">Usuario</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">Libro</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">Fecha de Reserva</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">Acciones</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            <tr v-for="reserva in reservas.data" :key="reserva.id">
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ reserva.usuario.name }}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ reserva.libro_id }} </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ reserva.fecha_reserva }} </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                <button
                  class="inline-block rounded border border-red-600 bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none active:text-red-500"
                  @click="cancelarReserva(reserva.id)">
                  Cancelar Reserva
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
        <ol class="flex justify-end gap-1 text-xs font-medium">
          <li>
            <a href="#"
              class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
              <span class="sr-only">Prev Page</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </li>

          <li>
            <a href="#"
              class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
              1
            </a>
          </li>

          <li class="block size-8 rounded border-blue-600 bg-blue-600 text-center leading-8 text-white">
            2
          </li>

          <li>
            <a href="#"
              class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
              3
            </a>
          </li>

          <li>
            <a href="#"
              class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
              4
            </a>
          </li>

          <li>
            <a href="#"
              class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
              <span class="sr-only">Next Page</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </li>
        </ol>
      </div>
    </div>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  reservas: Object,
  usuarioId: Number, // ID del usuario que se pasó desde el controlador
});

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Funcion para eliminar registro
const cancelarReserva = async (id) => {
  try {
    const response = await fetch(`/reservas/${id}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      }
    });

    if (response.ok) {
      console.log('Reserva cancelada');
      
      // Actualiza la lista de reservas eliminando la reserva cancelada
      props.reservas.data = props.reservas.data.filter(reserva => reserva.id !== id);
      window.location.reload();  // actualiza la lista de reserva
    } else {
      console.error('Error al cancelar:', response.statusText);
    }
  } catch (error) {
    console.error('Error en la solicitud:', error);
  }
}

</script>
