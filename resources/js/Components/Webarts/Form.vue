<script>
export default {
    name: 'WebartsForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ImgInput from '@/Components/ImgInput.vue';
import ImgInput3d from '@/Components/ImgInput3d.vue';
defineProps({
    form: {
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
})
defineEmits(['submit'])
</script>


<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar webart' : 'Crear nuevo webart' }}
        </template>

        <template #description>
            {{ updating ? 'Actualiza tu webart' : 'Crea un nuevo webart.' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="name"
                />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="imgBack" value="Imagen Back" />
                <ImgInput
                    id="imgBack"
                    v-model="form.img_back"
                    class="mt-1 block w-full"
                />
                <InputError :message="$page.props.errors.img_back" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="imgWebart" value="Imagen Webart" />
                <ImgInput3d
                    id="imgWebart"
                    v-model="form.img_webart"
                    class="mt-1 block w-full"
                />
                <InputError :message="$page.props.errors.target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="imgTarget" value="Imagen Target" />
                <ImgInput
                    id="imgTarget"
                    v-model="form.target"
                    class="mt-1 block w-full"
                />
                <InputError :message="$page.props.errors.img_webart" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="musica" value="Musica" />
                <TextInput
                    id="musica"
                    v-model="form.musica"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="musica"
                />
                <InputError :message="$page.props.errors.musica" class="mt-2" />
            </div>
           
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>