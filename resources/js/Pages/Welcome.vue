<script setup>
import { Head, Link } from '@inertiajs/vue3';
import card_3d from '@/Components/Webarts/card_3d.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    Webarts: {
        type: Object,
        required: true,
    }
});

</script>

<script>
    import image from "../../assets/informacion/logos/salitre.png";
    export default {
        data: function () {
            return {
                image: image
   
            }
        }
    }
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-black text-white w-full h-full">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white h-full">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl flex justify-between flex-col" style="height: 100vh;">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <img :src="image" alt="" srcset="" style="width: 125px;">
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>
                    </nav>
                </header>

                <main class="mt-6 h-full w-full ">
                    <div class="grid grid-cols-4 gap-4">
                        <template v-for="Webart in Webarts">
                            <card_3d :name_webart="Webart.img_webart" :name="Webart.name" :id="Webart.id"  :name_back="Webart.img_back"   />
                        </template>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-white">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
