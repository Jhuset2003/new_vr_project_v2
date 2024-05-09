<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: File,
});


const emit = defineEmits(['update:modelValue']);

const input = ref(null);

let imageData = null;

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if(file){        
        emit('update:modelValue', file);
        imageData = URL.createObjectURL(file)
    }
    
}
defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        ref="input"
        type="file"
        accept="image/*"
        @change="handleFileChange"
    >
    <img v-if="modelValue" :src="imageData" alt="Uploaded Image">
</template>