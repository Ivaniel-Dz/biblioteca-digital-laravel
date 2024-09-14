<template>
    <!-- Sección de Servicios -->
    <section id="services" class="py-16 px-pdg-mobile md:px-pdg-tablet text-color-txt dark:text-color-txt-dark">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Servicio 1 -->
                <div v-for="service in servicios" :key="service.service"
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden custom-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-4"> {{ service.title }} </h3>
                        <p class="leading-relaxed">
                            {{ service.description }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</template>

<script setup>
    const servicios = [
        {
            title: "Consulta Bibliográfica",
            description: "Ofrecemos asistencia personalizada para encontrar libros y recursos que se ajusten a tus necesidades."
        },
        {
            title: "Club de Lectura",
            description: "Únete a nuestros clubes de lectura para discutir tus libros favoritos con otros entusiastas."
        },
        {
            title: "Eventos y Talleres",
            description: "Participa en nuestros eventos y talleres educativos para mejorar tus habilidades de lectura y escritura."
        },
    ];
</script>