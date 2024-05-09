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

    <model-viewer v-if="modelValue" :src="imageData" alt="Uploaded Image"></model-viewer>
    <div v-if="modelValue">
        <Renderer ref="renderer" antialias :orbit-ctrl="{ enableDamping: true }" resize>
            <Camera :position="{ x: 1, y: 0, z: 0 }" />
            <Scene>
            <AmbientLight></AmbientLight>
            <GltfModel :src="imageData"/>
            </Scene>
        </Renderer>
    </div>
</template>


<script>
import {
  AmbientLight,
  Camera,
  GltfModel,
  Renderer,
  Scene,
} from 'troisjs';

export default {
  components: {
    AmbientLight,
    Camera,
    GltfModel,
    Renderer,
    Scene,
  },
};
</script>