<template>
    <app-layout title="OficinasLocales">
        <template #header> </template>

        <!-- <h1 v-for="(objeto,index) in ofiLoc" :key="index">
                        {{objeto.razon_social}}
                    </h1> -->
        <!-- Sidebar starts -->
        <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->

        <!-- Sidebar ends -->
        <!-- Remove class [ h-64 ] when adding a card block -->
        <div v-if="tpAccion == 0" class="overflow-x-auto mb-4">
            <div
                class="bg-grisFondo flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div
                        class="font-semibold mt-5 text-xl ml-2 text-rojito uppercase leading-tight"
                    >
                        <h1>gestionar oficinas y locales</h1>
                    </div>
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div class="grid justify-items-end ...">
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="openReg"
                                class="pl-5 pr-6 bg-white border-2 border-red-800 text-rojito mr-1 mt-2 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3"
                            >
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
                        <table
                            class="border-l-4 border-white mt-2 min-w-max w-full margin-3 table-auto bg-gray-100 border-solid"
                        >
                            <thead>
                                <tr
                                    class="bg-gray-300 text-rojito uppercase text-normal text-base leading-normal"
                                >
                                    <th class="py-3 px-6 text-left">
                                        N° Oficina/Local
                                    </th>
                                    <th class="py-3 px-6 text-left">Nit</th>
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Ubicación </th>
                                    <th class="py-3 px-6 text-left">Tel</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-rojito text-base font-light">
                                <tr
                                    v-for="(objeto, index) in ofiLoc"
                                    :key="index"
                                    class="border-b border-gray-200 hover:bg-gray-200"
                                >
                                    <td
                                        class="py-3 px-6 text-left whitespace-nowrap"
                                    >
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.numero
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.nit
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.razon_social
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.ubicacion
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.tel
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span
                                            v-if="objeto.estado == 1"
                                            class="bg-purple-200 text-green-600 py-1 px-3 rounded-full text-xs"
                                            >Activo</span
                                        >
                                        <span
                                            v-else
                                            class="bg-purple-200 text-rojito py-1 px-3 rounded-full text-xs"
                                            >Inactivo</span
                                        >
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div
                                            class="flex item-center justify-center"
                                        >
                                            <div
                                                class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110"
                                                title="Consulta detallada"
                                                @click="verOfiLoc"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-green-500 hover:scale-110"
                                                title="Actualizar"
                                                @click="actOfiLoc"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                                    />
                                                </svg>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-rojito hover:scale-110"
                                                title="Inactivar"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="openInact"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    />
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
        <div v-if="tpAccion == 1" class="overflow-x-auto mb-4">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-600 shadow-md rounded my-6">
                        <!-- This is an example component -->
                        <div
                            class="font-semibold mt-5 text-xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mt-9 mb-12 mx-auto">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg text-rojito font-bold"
                                            for="">
                                            Tipo
                                        </label>
                                        <select
                                            value="2"
                                            class="w-full px-3 py-2 text-base leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option value="1">Oficina</option>
                                            <option value="0">Local</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Número
                                    </label>
                                    <input
                                        v-model="num"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Número de oficina o local"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold"
                                    >
                                        Teléfono
                                    </label>
                                    <input
                                    v-model="tel"
                                        class="w-full px-3 py-2 text-base leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese número de teléfono"
                                    />
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold"
                                        for="">
                                        Nit
                                    </label>
                                    <input
                                    v-model="nit"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese Nit"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for=""
                                    >
                                        Razón social
                                    </label>
                                    <input
                                    v-model="raSocial"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese razón social"
                                    />
                                </div>
                                <div class="mb-2 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for=""
                                    >
                                        Actividad económica
                                    </label>
                                    <div
                                        class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                        <div class="w-full">
                                            <select
                                            v-model="idActEco"  
                                                class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                                name="estado">
                                                <option v-for="(objeto,index) in arrayAct" :key="index" :value="objeto.id">
                                                    
                                                    {{objeto.descripcion}} </option> 
                                                <!-- </option>
                                                <option value="0">
                                                    Contadores
                                                </option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 mb-1 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for="">
                                        Horario
                                    </label>
                                    <input
                                    v-model="horario"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese horario de atención"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for=""
                                    >
                                        Representante
                                    </label>
                                    <input
                                    v-model="repProp"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Nombre representante legal"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for="">
                                        Propio / Arrendado
                                    </label>
                                    <div
                                        class="flex sm:flex-row items-center mb-1 sm:space-x-5"
                                    >
                                        <div class="w-full">
                                            <select
                                            v-model="propArren"
                                                class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                                name="estado">
                                                <option value="1">
                                                    Propio
                                                </option>
                                                <option value="0">
                                                    Arrendado
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for="firstName">
                                        Ubicación
                                    </label>
                                    <input
                                    v-model="ubic"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese la ubicación"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for=""
                                    >
                                        Medidas
                                    </label>
                                    <input
                                    v-model="medidas"
                                        class="w-full px-3 py-2 text-sm leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Medidas en M2"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold text-rojito"
                                        for=""
                                    >
                                        Disponible para:
                                    </label>
                                    <div
                                        class="main flex mt-1 border  overflow-hidden select-none"
                                    >
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight text-xs">
                                            <input
                                            v-model="dispAlq"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name="sfg"
                                                checked/>
                                            <div
                                                class="title px-2 text-lg text-rojito my-auto">
                                                Alquiler
                                            </div>
                                        </label>
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight text-xs"
                                        >
                                            <input
                                            v-model="dispVen"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name="sfg"
                                                checked
                                            />
                                            <div
                                                class="title px-2 text-lg text-rojito my-auto"
                                            >
                                                Venta
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 mb-3 text-lg text-rojito font-bold text-rojito"
                                        for="">
                                        Paz y Salvo
                                    </label>
                                    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.min.css" />
                                    <label for="toggle-example" class="flex items-center cursor-pointer relative mb-4">
                                    <input v-model="pazSalv" type="checkbox" id="toggle-example" class="sr-only">
                                    <div class="toggle-bg bg-gray-400 border-2 border-gray-300 h-7 w-12 rounded-full"></div>
                                    <span v-if="pazSalv==1" class="ml-3 text-rojito text-base font-medium">Si</span>
                                    <span v-else class="ml-3 text-rojito text-base font-medium">No</span>
                                    </label>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 mb-1 text-xl text-rojito font-bold"
                                        for="">
                                        Estado
                                    </label>
                                    <div class="main flex border mt-0 rounded-full overflow-hidden select-none">
                                    <label class="flex radio p-2 cursor-pointer">
                                    <input v-model="edo" class="my-auto transform scale-125" type="radio" name="sfg" />
                                    <div class="ml-3 text-rojito text-base font-medium">Activo</div>
                                </label>
                                <label class="flex radio p-2 cursor-pointer">
                                    <input v-model="edo" class="my-auto transform scale-125" type="radio" name="sfg" />
                                    <div class="ml-3 text-rojito text-base font-medium">Inactivo</div>
                                </label>
                                </div>
                                </div>
                            </div>
                            <div class="flex justify-center mt-9 ...">
                                <button
                                    @click="cerrar"
                                    type="buttom"
                                    class="pl-5 pr-6 bg-white border-2 border-red-800 text-rojito mr-6 mt-2 text-lg rounded-lg hover:bg-rojito hover:text-white focus:border-3">
                                    Cancelar
                                </button>
                                <button
                                   @click="regOfiLoc"
                                    type="buttom"
                                    class="pl-5 pr-6 bg-white border-2 border-green-800 text-green-800 mr-1 mt-2 text-lg rounded-lg hover:bg-green-600 hover:text-white focus:border-3">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="tpAccion == 2" class="overflow-x-auto mb-4">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <!-- This is an example component -->
                        <div
                            class="font-semibold mt-5 text-xl ml-2 text-rojito uppercase leading-tight"
                        >
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div
                            class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-transparent"
                        >
                            <div
                                class="flex flex-col p-8 bg-gray-800 shadow-md hover:shodow-lg rounded-2xl"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-16 h-16 rounded-2xl p-3 border border-gray-800 text-blue-400 bg-gray-900"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                        <div class="flex flex-col ml-3">
                                            <div
                                                class="font-medium leading-none text-xl text-gray-100"
                                            >
                                                Inactivar?
                                            </div>
                                            <p
                                                class="text-sm text-gray-300 leading-none mt-1"
                                            >
                                                Para inactivar, click en el
                                                botón aceptar
                                            </p>
                                        </div>
                                    </div>
                                    <button
                                        @click="cerrar"
                                        class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-base shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">
                                        Cancelar
                                    </button>
                                    <button
                                        class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-base shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-700 text-white rounded-full">
                                        Aceptar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Sidebar from "@/Layouts/Sidebar.vue";

export default defineComponent({
    components: {
        AppLayout,
        Sidebar,
    },
    data() {
        return {
            tpAccion: 0,
            num: "",
            tel: "",
            nit: "",
            raSocial: "",
            horario: "",
            repProp: "",
            propArren: 0,
            ubic: "",
            medidas: "",
            edo: 1,
            dispVen: 0,
            dispAlq: 0,
            pazSalv: 0,
            idActEco: 0,
            idActEco: 0,
            arrayAct: [],
        };
    },
    props: ["ofiLoc"],

    methods: {
        openReg() {
            this.tittle = "Crear Oficina o Local";
            this.tpAccion = 1;
        },
        regOfiLoc() {
             let me= this;
            var url="/api/ofiLoc/registrar";
            axios.post(url,
            {
                num: this.num,
                tel: this.tel,
                nit: this.nit,
                raSocial: this.raSocial,
                horario: this.horario,
                repProp: this.repProp,
                propArren: this.propArren,
                ubic: this.ubic,
                medidas: this.medidas,
                edo: this.edo,
                dispVen: this.dispVen,
                dispAlq: this.dispAlq,
                pazSalv: this.pazSalv,
                idActEco: this.idActEco
            }
            ).then(function(response)
            {
                alert("Registro guardado exitosamente!");
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        actOfiLoc() {
            this.tpAccion = 1;
            this.tittle = "Actualizar Oficina / Local";
        },
        verOfiLoc() {
            alert("Botón ver ok");
        },
        openInact() {
            this.tittle = "Inactivar Oficina / Local";
            this.tpAccion = 2;
        },
        inactOfiLoc() {
            this.tpAccion=0;
        },
        cerrar() {
            this.tpAccion = 0;
        },
        listarActEco() {
      let me = this;
      var url = "/api/actEco/getActv";

      axios
        .get(url)
        .then(function (response) {
          var respuesta = response.data;
          me.arrayAct = respuesta.actEco;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    },
    mounted(){
        this.listarActEco();
    }
});
</script>
