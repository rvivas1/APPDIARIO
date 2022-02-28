<template>
    <app-layout title="Autorizaciones">
        <template #header> </template>
        
        <div v-if="tpAccion == 0" class="overflow-x-auto mb-4">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div
                        class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight"
                    >
                        <h1>gestionar autorizaciones</h1>
                    </div>
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div class="grid justify-items-end ...">
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="abrirRegAuto"
                                class="pl-5 pr-6 bg-white border-2 border-red-800 text-rojito mr-1 mt-2 text-xl rounded-lg hover:bg-verde hover:text-white focus:border-3"
                            >
                                <div class="flex sm:flex-cols- gap-2">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-6"
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
                            class="border-l-4 border-white mt-2 min-w-max w-full margin-3 table-auto bg-gray-100 border-solid">
                            <thead>
                                <tr
                                    class="bg-gray-300 text-red-800 uppercase text-normal text-xl leading-normal">
                                    <th class="py-3 px-6 text-left">Tipo</th>
                                    <th class="py-3 px-6 text-left">Área</th>
                                    <th class="py-3 px-6 text-left">Fecha</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-rojito text-base font-light">
                                <tr
                                    v-for="(objeto, index) in arrayData"
                                    :key="index"
                                    class="border-b border-gray-200 hover:bg-gray-200"
                                >
                                    <td
                                        class="py-3 px-6 text-left whitespace-nowrap"
                                    >
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.tipo
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.area}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.fecha}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div
                                            class="flex item-center justify-center"
                                        >
                                            <div
                                                class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110"
                                                title="Detalles"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="verAut(objeto)"
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
                                                class="w-4 mr-2 transform hover:text-green-500 hover:scale-110"
                                                title="Actualizar"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="actualizarAut(objeto)"
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
                                                    @click="abrirEliminar(objeto)"
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
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mt-9 mb-12 mx-auto">
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-xl font-bold text-rojito"
                                            for="">
                                            Área
                                        </label>
                                        <select
                                            @change="listarTpAut"
                                            v-model="idAreatrab"
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayareaTrab" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-xl font-bold text-rojito"
                                        for="">
                                        Fecha
                                    </label>
                                    <input
                                        v-model="fecha"
                                        class="w-full px-3 py-2 text-xl mb-0 leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="date"
                                        placeholder="Medidas en M2"/>
                                </div>
                            </div>
                             <div class="grid xl:grid-cols-1 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-xl font-bold text-rojito"
                                            for="">
                                            Tipo de autorización
                                        </label>
                                        <select
                                            v-model="idTpAuto"
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayTpAut" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                             </div>
                            <div class="grid xl:grid-cols-2 mb-4 xl:gap-6">
                                <div
                                    class="flex sm:flex-row mb-2 sm:space-x-5">
                                    <div class="w-full mt-2 md:mr-2">
                                        <label
                                            class="block text-xl font-bold text-rojito"
                                            for="">
                                            Oficina / Local
                                        </label>
                                        <select
                                            v-model="idOfLoc"
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayOfiLoc" :key="index" :value="objeto.id">
                                                {{objeto.numero }} -
                                                {{objeto.razon_social}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mt-2 md:mr-2 md:mb-0">
                                        <label
                                            class="block text-xl font-bold text-rojito"
                                            for="">
                                            Descripción
                                        </label>
                                        <textarea
                                            v-model="desc"
                                            name="body"
                                            cols="75"
                                            rows="3"
                                            placeholder="Escriba aquí la descripcion de la autorización"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-9 ...">
                        <button
                            @click="cerrarReg"
                            type="buttom"
                            class="pl-5 pr-5 bg-white border-2 text-xl border-rojito text-rojito mr-6 pt-1 pb-1 text-lg rounded-lg hover:bg-rojito hover:text-white focus:border-3">
                            Cancelar
                        </button>
                        <button
                            @click="regAutorizacion"
                            v-if="boton"
                            type="buttom"
                            class="pl-5 pr-5 bg-white border-2 text-xl border-green-800 text-verde pt-1 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                            Guardar
                        </button>
                        <button
                            @click="actAutorizacion"
                            v-if="boton==false"
                            type="buttom"
                            class="pl-5 pr-5 bg-white border-2 text-xl border-green-800 text-verde  pt-1 pb-1 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="tpAccion == 2" class="overflow-x-auto mb-4">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div
                            class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-transparent">
                            <div
                                class="flex flex-col p-8 bg-gray-800 shadow-md hover:shodow-lg rounded-2xl">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-16 h-16 rounded-2xl p-3 border border-gray-800 text-blue-400 bg-gray-900"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                        <div class="flex flex-col ml-3">
                                            <div
                                                class="font-medium leading-none text-xl text-white">
                                                Autorizacion: {{nomAut}}
                                            </div>
                                            <p
                                                class="text-lg text-white leading-none mt-1">
                                                Para eliminar, click en el
                                                botón aceptar
                                            </p>
                                        </div>
                                    </div>
                                    <button
                                        @click="cerrarReg"
                                        class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-lg shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">
                                        Cancelar
                                    </button>
                                    <button
                                    @click="eliminarAut"
                                        class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-lg shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-700 text-white rounded-full">
                                        Aceptar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="tpAccion == 3" class="overflow-x-auto mb-4">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mt-9 mb-12 mx-auto">
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito"
                                            for="">
                                            Área
                                        </label>
                                        <select 
                                            v-model="idAreatrab"
                                            disabled
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayareaTrab" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl font-bold text-rojito"
                                        for="">
                                        Fecha
                                    </label>
                                    <input
                                        v-model="fecha"
                                        disabled
                                        class="w-full px-3 py-2 text-xl mb-0 leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="date"/>
                                </div>
                            </div>
                             <div class="grid xl:grid-cols-1 xl:gap-6">
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito"
                                            for="">
                                            Tipo de autorización
                                        </label>
                                        <select
                                            v-model="idTpAuto"
                                            disabled
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayTpAut" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                             </div>
                            <div class="grid xl:grid-cols-2 mb-4 xl:gap-6">
                                <div
                                    class="flex sm:flex-row mb-2 sm:space-x-5">
                                    <div class="w-full mt-2 md:mr-2">
                                        <label
                                            class="block text-2xl font-bold text-rojito"
                                            for="">
                                            Oficina / Local
                                        </label>
                                        <select
                                            v-model="idOfLoc"
                                            disabled
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayOfiLoc" :key="index" :value="objeto.id">
                                                {{objeto.numero }} -
                                                {{objeto.razon_social}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mt-2 md:mr-2 md:mb-0">
                                        <label
                                            class="block text-2xl font-bold text-rojito"
                                            for="">
                                            Descripción
                                        </label>
                                        <textarea
                                            v-model="desc"
                                            disabled
                                            name="body"
                                            cols="75"
                                            rows="3"
                                            placeholder="Escriba aquí la descripcion de la autorización"
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-9 ...">
                        <button
                            @click="cerrarReg"
                            type="buttom"
                            class="pl-5 pr-5 bg-white border-2 border-red-800 text-rojito pt-1 text-xl rounded-lg hover:bg-rojito hover:text-white focus:border-3">
                            SALIR
                        </button>
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
            boton: "",
            fecha: "",
            desc: "",
            idOfLoc: "",
            nomAut:"",
            idAut: 0,
            idTpAuto: "",
            idAreatrab: "",
            arrayTpAut: [],
            arrayOfiLoc: [],
            arrayareaTrab: [],
            arrayData: [],
            arrayTiposAut: []
        };
    },
    props: ["autorizacion"],
    methods: {
        listarDatos(){
            let me = this;
            var url = "/api/autorizacion/data"

            axios.get(url)
            .then(function(response){
                var respuesta = response.data;
                me.arrayData = respuesta.autorizacion;
            })
            .catch(function(error){
                console.log(error);
            })
        },
        abrirRegAuto() {
            this.tittle = "Crear Autorización";
            this.tpAccion = 1;
            this.boton = true;
            this.borrar();
        },
        regAutorizacion() {
             let me= this;
            var url="/api/autorizacion/registrar";
            axios.post(url,
            {
                fecha: this.fecha,
                desc: this.desc,
                idTpAuto: this.idTpAuto,
                idOfLoc: this.idOfLoc
            }
            ).then(function(response)
            {
                alert("Registro guardado exitosamente!");
                me.listarDatos();
                me.tpAccion=0;
                me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        actualizarAut(data=[]) {
            this.tpAccion = 1;
            this.boton = false;
            this.tittle = "Actualizar Autorización";
            this.idAut =data["idAut"]
            this.fecha = data["fecha"];
            this.desc = data["desc"];
            this.idOfLoc = data["idof"];
            this.idTpAuto = data["idat"];
            this.idAreatrab = data["idaTr"];
            this.listarTpAut();
        },
        actAutorizacion() {
             let me= this;
            var url="/api/autorizacion/actualizar";
            axios.put(url,
            {
                id: this.idAut,
                fecha: this.fecha,
                desc: this.desc,
                idTpAuto: this.idTpAuto,
                idOfLoc: this.idOfLoc,
                idAreatrab: this.idaTr
            }
            ).then(function(response)
            {
                alert("Registro actualizado correctamente!");
                me.listarDatos();
                me.tpAccion=0;
                me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        verAut(data=[]) {
            this.tpAccion = 3;
            this.tittle = "información de la Autorización";
            this.idAut =data["idAut"]
            this.fecha = data["fecha"];
            this.desc = data["desc"];
            this.idOfLoc = data["idof"];
            this.idTpAuto = data["idat"];
            this.idAreatrab = data["idaTr"];
            this.listarTpAut();
        },
        abrirEliminar(data=[]) {
            this.tpAccion=2;
            this.tittle="eliminar autorización"
            this.idAut = data['idAut'];
            this.nomAut = data['tipo'];
        },
        eliminarAut() {
             let me= this;
            var url="/api/autorizacion/eliminar";
            axios.post(url,
            {
                id: this.idAut,
            }
            ).then(function(response)
            {
                alert("Registro eliminado correctamente!");
                me.listarDatos();
                me.tpAccion=0;
            })
            .catch(function(error){
                console.log(error.message);
            })
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
        listarTpAut() {
        let me = this;
        var url = "/api/tipoAut/getTpAuto?id_at=" + this.idAreatrab;

        axios
            .get(url)
            .then(function (response) {
            var respuesta = response.data;
            me.arrayTpAut = respuesta.tipoAut;
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        listarTiposAut() {
        let me = this;
        var url = "/api/tipoAut/getTiposAut";

        axios
            .get(url)
            .then(function (response) {
            var respuesta = response.data;
            me.arrayTiposAut = respuesta.tipoAut;
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        listarAreaTrab() {
        let me = this;
        var url = "/api/areaTrab/getArea";

        axios
            .get(url)
            .then(function (response) {
            var respuesta = response.data;
            me.arrayareaTrab = respuesta.areaTrab;
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        cerrarReg() {
            this.tpAccion = 0;
            this.borrar();
        },
        borrar() {
            this.fecha="";
            this.desc="";
            this.idOfLoc="";
            this.idTpAuto="";
            this.idAreatrab="";
            this.idAut = 0;
        },
    },
    mounted(){
        this.listarOfiLoc();
        // this.listarTpAut();
        this.listarAreaTrab();
        this.listarDatos();
    },
});
</script>
