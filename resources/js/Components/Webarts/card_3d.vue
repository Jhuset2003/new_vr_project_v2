<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    name_webart: {
        type: Text,
    },
    name: {
        type: Text,
    },
    name_back: {
        type: Text,
    },
    id: {
        type: Number,
    },
});

</script>

<template>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

      <Renderer ref="renderer" antialias :orbit-ctrl="{ enableDamping: true }">
        <Camera :position="{ x: 1, y: 0, z: 0 }" />
        <Scene>
          <AmbientLight></AmbientLight>
          <GltfModel :src="'storage/images/webart/' + name_webart"/>
        </Scene>
      </Renderer>
    
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ name }}</h5>
        </a>
        <div class="flex justify-between">
        <Link
            :href="route('webartCamera',{ id: id })"
            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
        >
            Camara
        </Link>
      </div>
    </div>
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
  }
};
</script>