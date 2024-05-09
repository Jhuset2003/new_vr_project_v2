<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<script>
    import image from "../../assets/informacion/logos/salitre.png"
    
    export default {
        data: function () {
            return {
                image: image
            }
        }
    }
</script>

<template>
    <Link :href="'/'">
        <img :src="image" alt="" srcset="">
    </Link>
</template>
