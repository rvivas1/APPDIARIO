<template>
    <div>
        <div class="p-6 sm:px-20 pb-6 bg-white border-b border-gray-200">
            <!-- <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div> -->

            <div class="mt-8 text-rojito text-4xl">
                COMPLEJO URBANO DIARIO DEL OTÚN
            </div>
        </div>
        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <div class="ml-4 text-2xl text-verde leading-7 font-semibold"><a href="https://tailwindcss.com/">Sistema</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-xl text-rojito">
                        Este es un nuevo sistema que te permitirá tener el control de toda tu información de un modo más seguro
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <div class="ml-4 text-2xl text-verde leading-7 font-semibold">Actualización</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-xl text-rojito">
                        Con el fin de brindar un servicio mas eficáz y oportuno a nuestros clientes y usuarios.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
    })
</script>
