<script>
export default {
    name: 'WebartsIndex',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';

defineProps({
    Webarts: {
        type: Object,
        required: true,
    },
})

const deleteWebart = id => {
    if (confirm('¿Estás seguro de querer eliminar este webart?')) {
        router.delete(route('webart.destroy', id))
    }
}

</script>
<template>
     <AppLayout title="Webart">        
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="color: white;">
                Webarts
            </h1>
        </template>   

        <div class="py-12 container_welcome">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 25px;">
                    <div class="flex justify-between">
                        <Link
                            :href="route('webart.create')"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Crear Webart
                        </Link>
                    </div>
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">Nombre</th>
                                    <th class="px-4 py-2">Imagen Back</th>
                                    <th class="px-4 py-2">Imagen 3d</th>
                                    <th class="px-4 py-2">Target</th>
                                    <th class="px-4 py-2">Musica</th>
                                    <th class="px-4 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100" v-if="Webarts.total > 0">
                                <template v-for="Webart in Webarts.data">
                                    <tr>
                                        <td class="border px-4">{{ Webart.name }}</td>
                                        <td class="border px-4">{{ Webart.img_back }}</td>
                                        <td class="border px-4">{{ Webart.img_webart }}</td>
                                        <td class="border px-4">{{ Webart.target }}</td>
                                        <td class="border px-4">{{ Webart.musica }}</td>                                            
                                        <td class="border px-4 py-4" style="width: 300px">
                                            <Link
                                                class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                @click="deleteWebart(Webart.id)"
                                            >
                                                Eliminar
                                            </Link>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                            <tbody v-else>
                                <tr class="bg-red-400 text-white text-center">
                                    <td colspan="6" class="border px-4 py-2">No hay webarts para mostrar</td>
                                </tr>
                            </tbody>
                            <tfoot
                                v-if="Webarts.last_page > 1"
                                class="text-xs font-semibold uppercase text-gray-400 bg-gray-50"
                            >
                                <tr>
                                    <td colspan="4" class="border px-4 py-4 text-right">
                                        <Link
                                            v-if="Webarts.current_page > 1"
                                            :href="Webarts.prev_page_url"
                                            class="px-3 py-1 bg-indigo-500 hover:bg-gray-600 text-white rounded"
                                        >
                                            Anterior
                                        </Link>
                                        <Link
                                            v-if="Webarts.current_page < projects.last_page"
                                            :href="Webarts.next_page_url"
                                            class="ml-2 px-3 py-1 bg-indigo-500 hover:bg-gray-600 text-white rounded"
                                        >
                                            Siguiente
                                        </Link>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

     </AppLayout>    
</template>