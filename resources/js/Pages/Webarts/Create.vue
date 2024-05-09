<script>
export default {
    name: 'WebartsCreate',
}
</script>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from '@/Layouts/AppLayout.vue';
import WebartForm from '@/Components/Webarts/Form.vue';
const form = useForm({
    name: '',
    img_back: '',
    img_webart: '',
    target: '',
    musica: '',
});
</script>

<template>
    <AppLayout title="Crear Webart">
        <template #header>
            <h1 class="font-semibold text-xl text-white-800 leading-tight" style="color: white;">
                Crear Webart
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <WebartForm
                            :form="form"
                            @submit="form.post(route('webart.store'))"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>