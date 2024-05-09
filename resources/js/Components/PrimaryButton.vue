<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150 button_green">
        <slot />
    </button>
</template>

<style>
    .button_green{
        background: #a9ffa9;
        color: #7E4CEA;
    }
    .button_green:hover{
        background: #7E4CEA;
        color: #a9ffa9;
    }
    .button_green:active{
        background: #4f3a99;
        color: #80ff81;
    }
</style>