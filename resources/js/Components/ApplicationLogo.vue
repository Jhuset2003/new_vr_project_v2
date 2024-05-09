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
    <img :src="image" alt="" srcset="">
</template>
