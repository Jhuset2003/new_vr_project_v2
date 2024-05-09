<script setup>  
  import 'mind-ar/dist/mindar-image.prod.js'
  import 'aframe'
  import 'mind-ar/dist/mindar-image-aframe.prod.js'
  import { ref, defineExpose } from 'vue'
  import { Head } from '@inertiajs/vue3';
  const sceneRef = ref(null)
  defineExpose({ sceneRef })
</script>
<script>
export default {
  props: {
    Webarts: {
        type: Object,
        required: true,
    }
  }
}
</script>

<template>
  <Head title="Welcome" />
  <div class="minar">       
    <div class="container">
      <a-scene
        ref="sceneRef"
        :mindar-image="`imageTargetSrc: /storage/images/target/${Webarts[0].target}; autoStart: true; uiLoading: no; uiError: no; uiScanning: no;`"
        color-space="sRGB"
        embedded
        renderer="colorManagement: true, physicallyCorrectLights"
        vr-mode-ui="enabled: false"
        device-orientation-permission-ui="enabled: false"
      >
        <a-assets>
          <img
            id="card"
            :src="`/storage/images/backs/${Webarts[0].img_back}`"
            crossorigin="anonymous"
          />
          <a-asset-item
            id="avatarModel"
            :src="`/storage/images/webart/${Webarts[0].img_webart}`"
            crossorigin
          ></a-asset-item>
        </a-assets>

        <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>

        <a-entity mindar-image-target="targetIndex: 0">
          <a-plane
            src="#card"
            position="0 0 0"
            height="0.552"
            width="1"
            rotation="0 0 0"
          ></a-plane>
          <a-gltf-model
            rotation="0 0 0 "
            position="0 0 0.1"
            scale="10 10 10"
            src="#avatarModel"
            animation="property: position; to: 0 0.1 0.1; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate"
          ></a-gltf-model>
        </a-entity>
      </a-scene> 
    </div>
  </div> 
</template>

<style scoped>
.minar {
  text-align: center;
}

.container {
  margin: 20px auto;
  position: relative;
  height: 400px;
  width: 600px;
  overflow: hidden;
}
</style>

