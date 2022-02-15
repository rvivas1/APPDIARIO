<template>
    <app-layout title="Autorizaciones">
        <template #header>
            
        </template>
        
                    <!-- <h1 v-for="(objeto,index) in autorizacion" :key="index">
                        {{objeto.descripcion}}
                    </h1> -->
    <div class="overflow-x-auto mb-4">
        <div class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
            <sidebar />
            <div class="lg:w-5/6">
            <div class="font-semibold mt-5 text-xl ml-2 text-red-800 uppercase leading-tight">
             <h1>gestionar autorizaciones</h1>
            </div>
            <div class="bg-grey-200 shadow-md rounded my-6">
                <div class="grid justify-items-end ..." >
                    <button type="button d-grid gap-1 d-md-flex"
                    @click="crearPer"
                    class="pl-5 pr-6 bg-white border-2 border-red-800 text-red-800 mr-1 mt-2 text-lg rounded-lg hover:bg-green-100 hover:text-grey-300 focus:border-3">
                        <div class="flex sm:flex-cols- gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-6 text-Rred-800"
                            viewBox="0 0 24 24 "
                                stroke="currentColor"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                            />
                            </svg>
                        <div class="col-span-2 mt-1">CREAR</div>
                        </div>
                    </button>
                </div>           
                    <table class="border-l-4 border-white mt-2 min-w-max w-full margin-3 table-auto bg-gray-100 border-solid">
                        <thead>
                            <tr class="bg-gray-300 text-red-800 uppercase text-normal text-base leading-normal">
                                <th class="py-3 px-6 text-left">Tipo</th>
                                <th class="py-3 px-6 text-left">Área</th>
                                <th class="py-3 px-6 text-left">Fecha</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-red-800 text-base font-light">
                            <tr v-for="(objeto,index) in autorizacion" :key="index" class="border-b border-gray-200 hover:bg-gray-200">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{objeto.tp_autorizacion}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{objeto.area_trabajo}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                         <span class="font-medium">{{objeto.fecha}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Detalles">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Actualizar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Inactivar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Sidebar from '@/Layouts/Sidebar.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Sidebar
        },
        props:['autorizacion'],
    })
</script>
