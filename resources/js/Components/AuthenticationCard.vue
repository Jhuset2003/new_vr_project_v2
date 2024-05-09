<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 card_container_manually">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg form_card_register">
            <slot />
        </div>
    </div>
</template>

<style scoped>
    .card_container_manually{
        background: #7e4cea;
    }
    .form_card_register{
        background: #a68ee8;

    }
</style>