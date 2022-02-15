<template>
    <app-layout title="OficinasLocales">
        <template #header>
            
        </template>
        
                    <!-- <h1 v-for="(objeto,index) in ofiLoc" :key="index">
                        {{objeto.razon_social}}
                    </h1> -->
                       <!-- Sidebar starts -->
                    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
               
                    <!-- Sidebar ends -->
                    <!-- Remove class [ h-64 ] when adding a card block -->    
    <div v-if="tpAccion==0" class="overflow-x-auto mb-4">
        <div class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
             <sidebar />
        <div class="lg:w-5/6">
         <div class="font-semibold mt-5 text-xl ml-2 text-red-800 uppercase leading-tight">
             <h1>gestionar oficinas y locales</h1>
            </div>
                <div class="bg-grey-200 shadow-md rounded my-6">
                <div class="grid justify-items-end ..." >
                    <button type="button d-grid gap-1 d-md-flex"
                    @click="regrOfiLoc"
                    class="pl-5 pr-6 bg-white border-2 border-red-800 text-red-800 mr-1 mt-2 text-lg rounded-lg hover:bg-green-400 hover:text-white focus:border-3">
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
                                <th class="py-3 px-6 text-left">N° Oficina/Local</th>
                                <th class="py-3 px-6 text-left">Nit</th>
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Ubicación</th>
                                <th class="py-3 px-6 text-left">Tel</th>
                                <th class="py-3 px-6 text-center">Estado</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-red-800 text-base font-light">
                            <tr v-for="(objeto,index) in ofiLoc" :key="index" class="border-b border-gray-200 hover:bg-gray-200">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{objeto.numero}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{objeto.nit}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                         <span class="font-medium">{{objeto.razon_social}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                   <div class="flex items-center">
                                         <span class="font-medium">{{objeto.ubicacion}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                   <div class="flex items-center">
                                         <span class="font-medium">{{objeto.tel}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span v-if="objeto.estado==1" class="bg-purple-200 text-green-600 py-1 px-3 rounded-full text-xs">Activo</span>
                                    <span v-else class="bg-purple-200 text-red-600 py-1 px-3 rounded-full text-xs">Inactivo</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Detalles" @click="verOfiLoc">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Actualizar" @click="actOfiLoc">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Inactivar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="inacOfiLoc">
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
   <div v-if="tpAccion==1" class="overflow-x-auto mb-4">
     
                <div class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
                <sidebar />
                    <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <!-- This is an example component -->
                         <div class="font-semibold mt-5 text-xl ml-2 text-red-800 uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                            <div class="max-w-5xl mt-9 mb-12 mx-auto">
                                    <div class="grid xl:grid-cols-3 xl:gap-6">
                                        <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                        <div class="w-full md:mr-2">
                                        <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                            Tipo
                                            </label>
                                        <select value="2" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow focus:outline-none focus:shadow-outline" name="estado" >
                                            <option value="1">Oficina</option>
                                            <option value="0">Local</option>
                                        </select>
                                        </div>
                                    </div>
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Número
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Número de oficina o local"
                                                                />
                                                            </div>
                                                            <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700">
                                                                    Teléfono
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Ingrese número de teléfono"
                                                                />
                                                            </div>
                                    </div>
                                    <div class="grid xl:grid-cols-3 xl:gap-6">
                                        
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Nit
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Ingrese Nit"
                                                                />
                                                            </div>
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Razón social
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Ingrese razón social"
                                                                />
                                                            </div>
                                                            <div class="mb-2 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Actividad económica
                                                                </label>
                                                                    <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                            <div class="w-full ">
                                            
                                            <select class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow focus:outline-none focus:shadow-outline" name="estado">
                                                <option value="1">Abogados</option>
                                                <option value="0">Contadores</option>
                                            </select>
                                            </div>
                                        </div>
                                                            </div>
                                    </div>
                                    <div class="grid xl:grid-cols-3 mb-1 xl:gap-6">
                                        
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Horario
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Ingrese horario de atención"
                                                                />
                                                            </div>
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Representante
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Nombre representante legal"
                                                                />
                                                            </div>
                                                            <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Propio / Arrendado
                                                                </label>
                                                                <div class="flex sm:flex-row items-center mb-1 sm:space-x-5">
                                        <div class="w-full">
                                        
                                        <select class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow focus:outline-none focus:shadow-outline" name="estado">
                                            <option value="1">Propio</option>
                                            <option value="0">Arrendado</option>
                                        </select>
                                        </div>
                                    </div>
                                                            </div>
                                    </div>
                                    <div class="grid xl:grid-cols-3  xl:gap-6">
                                        
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Ubicación
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Ingrese la ubicación"
                                                                />
                                                            </div>
                                        <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Medidas
                                                                </label>
                                                                <input
                                                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                                    id="firstName"
                                                                    type="text"
                                                                    placeholder="Medidas en M2"
                                                                />
                                                            </div>
                                                            <div class="mb-4 md:mr-2 md:mb-0">
                                                                <label class="block mt-2 text-base font-bold text-gray-700" for="firstName">
                                                                    Disponible para:
                                                                </label>
                                                                <div class="main flex mt-1 border rounded-full overflow-hidden select-none">
                                                        <label class="flex radio  p-2 cursor-pointer font-extralight text-xs">
                                                            <input class="my-auto transform scale-125" type="checkbox" name="sfg" checked />
                                                            <div class="title px-2 my-auto">Alquiler</div>
                                                        </label>
                                                        <label class="flex radio p-2 cursor-pointer font-extralight text-xs">
                                                            <input class="my-auto transform scale-125" type="checkbox" name="sfg" checked />
                                                            <div class="title px-2 my-auto">Venta</div>
                                                        </label>
                                                </div>
                                                    </div>
                                                </div>
                                
                   <div class="flex justify-center mt-9 ...">
                        <button @click="cerrarReg" type="buttom" class="pl-5 pr-6 bg-white border-2 border-red-800 text-red-800 mr-6 mt-2 text-lg rounded-lg hover:bg-red-600 hover:text-white focus:border-3">Cancelar</button>
                         <button type="buttom" class="pl-5 pr-6 bg-white border-2 border-green-800 text-green-800 mr-1 mt-2 text-lg rounded-lg hover:bg-green-600 hover:text-white focus:border-3">Guardar</button>
                   </div>
                            </div>
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
            Sidebar,
        },
        data(){
            return{
                tpAccion: 0,
                tittle: "",

            };
        },
        props:['ofiLoc'],

        methods:{
            regrOfiLoc(){
                this.tittle="Crear Oficina o Local";
                this.tpAccion = 1;

            },
            actOfiLoc(){
                this.tpAccion=1;
                this.tittle="Actualizar Oficina / Local"

                alert('Botón actualizar ok');

            },
            verOfiLoc(){
                alert('Botón ver ok');
            },
            inacOfiLoc(){
                alert('Botón inactivar ok');
            },
            cerrarReg(){
                this.tpAccion=0;
            },
        },
    })
</script>
