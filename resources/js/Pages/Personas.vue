<template>
    <app-layout title="Personas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Personas
            </h2>
        </template>
        <!-- <h1 v-for="(objeto,index) in persona" :key="index">
                        {{objeto.nombre}}
                        {{objeto.apellido}}
                    </h1> -->
        <div v-if="tpAccion == 0" class="overflow-x-auto mb-4">
            <div
                class="bg-grisFondo flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div
                        class="font-semibold mt-5 text-xl ml-2 text-red-800 uppercase leading-tight"
                    >
                        <h1>gestionar Funcionarios</h1>
                    </div>
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div class="grid justify-items-end ...">
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="abrirReg"
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
                                    class="bg-gray-300 text-red-800 uppercase text-normal text-base text-rojito leading-normal">
                                    <th class="py-3 px-6 text-left">Tipo y N° Documento</th>
                                    <th class="py-3 px-6 text-left">Nombres y apellidos</th>
                                    <th class="py-3 px-6 text-left">Celular</th>
                                    <th class="py-3 px-6 text-left">Oficina/Local</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-red-800 text-base font-light">
                                <tr
                                    v-for="(objeto, index) in persona"
                                    :key="index"
                                    class="border-b border-gray-200 hover:bg-gray-100"
                                >
                                    <td
                                        class="py-3 px-6 text-left whitespace-nowrap"
                                    >
                                        <div class="flex items-center">
                                            <span class="font-medium"
                                                >{{ objeto.tipo_documento }}
                                                {{ objeto.num_doc }}</span
                                            >
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span
                                                >{{ objeto.nombre }}
                                                {{ objeto.apellido }}</span
                                            >
                                            <!-- <span>{{objeto.apellido}}</span> -->
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ objeto.tel }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span>{{ objeto.ofiLoc }}</span>
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
                                            class="bg-purple-200 text-red-600 py-1 px-3 rounded-full text-xs"
                                            >Inactivo</span
                                        >
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div
                                            class="flex item-center justify-center"
                                        >
                                            <div
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="verPersona"
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
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    />
                                                </svg>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="actualizarper"
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
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="inactPersona"
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
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <!-- This is an example component -->
                        <div
                            class="font-bold mt-5 text-xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <!-- This is an example component -->
                        <div class="max-w-5xl mt-10 mx-auto">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Tipo de identificación
                                        </label>
                                        <select
                                        v-model="idTpDoc"
                                            class="w-full px-3 py-2 text-base text-rojito leading-tight border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="none">
                                            <option v-for="(objeto,index) in arraytpDoc" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold"
                                        for="">
                                        Número
                                    </label>
                                    <input
                                    v-model="numDoc"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Número de identificación"
                                        required="required"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold">
                                        Nombre
                                    </label>
                                    <input
                                    v-model="nombre"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese nombres"
                                    />
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for="">
                                        Apellido
                                    </label>
                                    <input
                                    v-model="apellido"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese apellidos"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for="">
                                        Teléfono celular
                                    </label>
                                    <input
                                    v-model="tel"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="number"
                                        placeholder="Ingrese número de teléfono"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for="">
                                        Teléfono alterno
                                    </label>
                                    <input
                                    v-model="telAlter"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese número de teléfono"
                                    />
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 mb-1 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for="">
                                        Correo
                                    </label>
                                    <input
                                    v-model="correo"
                                        class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese correo electrónico"
                                    />
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg text-rojito font-bold "
                                        for=""
                                    >
                                        Oficina / Local
                                    </label>
                                    <div
                                        class="flex sm:flex-row items-center mb-1 sm:space-x-5"
                                    >
                                        <div class="w-full">
                                            <select
                                            v-model="idOfLoc"
                                                class="w-full px-3 py-2 text-base text-rojito leading-tight  border rounded shadow focus:outline-none focus:shadow-outline"
                                                name="estado">
                                                <option v-for="(objeto,index) in arrayOfiLoc" :key="index" :value="objeto.id">
                                                    {{objeto.numero}}
                                                    <!-- {{objeto.nombre}} -->
                                                    </option>
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 mb-1 text-xl text-rojito font-bold"
                                        for="">
                                        Estado
                                    </label>
                                    <div class="main flex border mt-0 rounded-full overflow-hidden select-none">
                                    <label class="flex radio p-2 cursor-pointer">
                                    <input v-model="edo" :value="1" class="my-auto transform scale-125" type="radio" name="sfg" />
                                    <div class="ml-3 text-rojito text-base font-medium">Activo</div>
                                </label>
                                <label class="flex radio p-2 cursor-pointer">
                                    <input v-model="edo" :value="0" class="my-auto transform scale-125" type="radio" name="sfg" />
                                    <div class="ml-3 text-rojito text-base font-medium">Inactivo</div>
                                </label>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="flex justify-center mt-9 ...">
                            <button
                                @click="cerrarReg"
                                type="buttom"
                                class="pl-5 pr-6 bg-white border-2 border-red-800 text-red-800 mr-6 mt-2 text-lg rounded-lg hover:bg-rojito hover:text-white focus:border-3">
                                Cancelar
                            </button>
                            <button
                               @click="regPersona"
                                type="buttom"
                                class="pl-5 pr-6 bg-white border-2 border-green-800 text-green-800 mr-1 mt-2 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                                Guardar
                            </button>
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
            tittle: "",
            numDoc: "",
            nombre: "",
            apellido: "",
            tel: "",
            telAlter: "",
            correo: "",
            edo: "",
            idTpDoc: "",
            idOfLoc: "",
            arraytpDoc: [],
            arrayOfiLoc: [],
        };
    },
    props: ["persona"],
    methods: {
        abrirReg(){
            this.tittle = "Registrar funcionario";
            this.tpAccion = 1;

        },
        regPersona() {
            let me= this;
            var url="/api/persona/registrar";
            axios.post(url,
            {
                idTpDoc: this.idTpDoc,
                numDoc: this.numDoc,
                nombre: this.nombre,
                apellido: this.apellido,
                tel: this.tel,
                telAlter: this.telAlter,
                correo: this.correo,
                edo: this.edo,
                idOfLoc: this.idOfLoc
            }
            ).then(function(response)
            {
                alert("Registro guardado exitosamente!");
                me.tpAccion=0;
                me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        actualizarper() {
            this.tpAccion = 1;
            this.tittle = "Actualizar Funcionario";
        },
        verPersona() {
            alert("Botón ver ok");
        },
        inactPersona() {
            alert("Botón inactivar ok");
        },
        cerrarReg() {
            this.tpAccion = 0;
        },
        listartpDoc() {
      let me = this;
      var url = "/api/tpDoc/getTpDoc";

      axios
        .get(url)
        .then(function (response) {
          var respuesta = response.data;
          me.arraytpDoc = respuesta.tpDoc;
        })
        .catch(function (error) {
          console.log(error);
        });
        },
        listarOfiLoc() {
      let me = this;
      var url = "/api/ofiLoc/getOfiLoc";

      axios
        .get(url)
        .then(function (response) {
          var respuesta = response.data;
          me.arrayOfiLoc = respuesta.ofiLoc;
        })
        .catch(function (error) {
          console.log(error);
        });
        },
      borrar() {
            this.numDoc="",
            this.nombre= "",
            this.apellido= "",
            this.raSocial= "",
            this.tel= "",
            this.telAlter= "",
            this.correo= 0,
            this.edo= "",
            this.idTpDoc= "",
            this.idOfLoc= 1
        },
    },
    mounted(){
        this.listartpDoc();
        this.listarOfiLoc();
    }
});
</script>
