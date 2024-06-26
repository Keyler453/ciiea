<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import AvatarInput from "@/Components/AvatarInput.vue";
import Checkbox from "@/Components/Checkbox.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    administrator: {
        type: Object,
        required: true,
    },
});

const administratorForm = useForm({
    id: props.administrator.id,
    name: props.administrator.name,
    email: props.administrator.email,
    mobile: props.administrator.mobile,
    short_description: props.administrator.short_description,
    long_description: props.administrator.long_description,
    is_contact: Boolean(props.administrator.is_admin_contact),
});

const handleUpdateAdministrator = () => {
    administratorForm.patch(route("admin.administrators.update"));
};
</script>
<template>
    <Head title="Administrador" />
    <h1 class="pl-8 text-3xl font-bold">Editar administrador</h1>
    <div class="flex w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateAdministrator" class="w-full">
                <div>
                    <InputLabel for="name" value="Nombre del administrador" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="administratorForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorForm.errors.name"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="email" value="Correo electrónico" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="administratorForm.email"
                        required
                        autocomplete="email"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorForm.errors.email"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="mobile" value="Número telefónico" />
                    <TextInput
                        id="mobile"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="administratorForm.mobile"
                        required
                        autocomplete="mobile"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorForm.errors.mobile"
                    />
                </div>
                <div class="mt-4 flex justify-between">
                    <div class="w-2/3">
                        <InputLabel for="short_description" value="Cargo" />
                        <TextInput
                            id="short_description"
                            type="text"
                            class="mt-1 w-full"
                            v-model="administratorForm.short_description"
                            required
                            autocomplete="short_description"
                        />
                        <InputError
                            class="mt-2"
                            :message="
                                administratorForm.errors.short_description
                            "
                        />
                    </div>
                    <div class="flex w-1/3 items-center gap-4 px-10">
                        <InputLabel for="short" value="Agregar como contacto" />
                        <Checkbox
                            id="is_contact"
                            v-model="administratorForm.is_contact"
                            :checked="administratorForm.is_contact"
                        />
                        <InputError
                            class="mt-2"
                            :message="administratorForm.errors.is_contact"
                        />
                    </div>
                </div>
                <div class="mt-4">
                    <InputLabel for="long_description" value="Actividades" />
                    <TextInput
                        id="long_description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="administratorForm.long_description"
                        autocomplete="long_description"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorForm.errors.long_description"
                    />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="administratorForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="administratorForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <AvatarInput
                :avatar-url="
                    props.administrator.image
                        ? route('profile-images.show', props.administrator.image.name)
                        : null
                "
                :user-id="props.administrator.id"
                :upload-image-route="route('admin.administrators.upload-image')"
                class="ml-8 w-full md:w-1/2"
            />
        </section>
    </div>
</template>
