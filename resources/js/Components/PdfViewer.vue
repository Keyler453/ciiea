<script setup>
import { VuePDF, usePDF } from "@tato30/vue-pdf";
import { ref } from "vue";

const props = defineProps({
    url: {
        type: String,
        required: true,
    },
});

const { pdf, pages, info } = usePDF("/" + props.url);

const page = ref(1);
</script>
<template>
    <div
        class="relative flex items-center justify-center overflow-hidden rounded"
    >
        <div class="absolute z-10 flex h-full w-full justify-between rounded">
            <button
                @click="page = page > 1 ? page - 1 : page"
                class="h-full bg-neutral-900 bg-opacity-10 p-2 text-neutral-50 transition duration-200 hover:bg-opacity-40"
            >
                <font-awesome-icon
                    :icon="{ prefix: 'fa', iconName: 'angle-left' }"
                    style="color: white"
                />
            </button>
            <button
                @click="page = page < pages ? page + 1 : page"
                class="h-full bg-neutral-900 bg-opacity-10 p-2 text-neutral-50 transition duration-200 hover:bg-opacity-40"
            >
                <font-awesome-icon
                    :icon="{ prefix: 'fa', iconName: 'angle-right' }"
                    style="color: white"
                />
            </button>
        </div>
        <a
            :href="props.url"
            class="absolute bottom-2 right-10 z-10 rounded-lg bg-neutral-900 bg-opacity-10 px-4 py-3 text-neutral-50 hover:bg-opacity-40"
            >Descargar</a
        >
        <VuePDF :pdf="pdf" :page="page" />
    </div>
</template>
