<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Salitre">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: white;">
                Salitre
            </h2>
        </template>

        <div class="py-12 container_welcome">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
    .container_welcome{
        background: #7e4cea;
    }
</style>
