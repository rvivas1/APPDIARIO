<template>
    <!-- <button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot></slot>
    </button> -->
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="abrirRegAuto"
                                class="pl-5 pr-6 bg-white border-2 border-red-800 text-rojito mr-1 mt-2 text-xl rounded-lg hover:bg-verde hover:text-white focus:border-3">
                                <div class="flex sm:flex-cols- gap-2">
                                    <div class="col-span-2 mt-1">INICIAR SESIÓN</div>
                                </div>
                            </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    })
</script>
