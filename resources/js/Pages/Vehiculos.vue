<template>
    <app-layout title="Vehiculos">
        <template #header> </template>

        <!-- <h1 v-for="(objeto,index) in vehiculo" :key="index">
                        {{objeto.placa}}
                    </h1> -->
        <div v-if="tpAccion == 0" class="overflow-x-auto">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="lg:w-5/6">
                    <div
                        class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight"
                    >
                        <h1>gestionar vehículos</h1>
                    </div>
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div class="grid justify-items-end ...">
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="abrirRegVehi"
                                class="pl-5 pr-6 bg-white border-2 border-red-800 text-rojito mr-1 mt-2 text-xl rounded-lg hover:bg-verde hover:text-white focus:border-3">
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
                            class="border-l-4 border-white mt-2 min-w-max w-full margin-3 table-auto bg-gray-100 border-solid"
                        >
                            <thead>
                                <tr
                                    class="bg-gray-300 text-red-800 uppercase text-normal text-xl leading-normal">
                                    <th class="py-3 px-6 text-left">Placa</th>
                                    <th class="py-3 px-6 text-left">Tipo</th>
                                    <th class="py-3 px-6 text-left">Marca</th>
                                    <th class="py-3 px-6 text-left">color</th>
                                    <th class="py-3 px-6 text-left">Propietario</th>
                                    <th class="py-3 px-6 text-center"> Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-red-800 text-lg font-light">
                                <tr
                                    v-for="(objeto, index) in arrayData"
                                    :key="index"
                                    class="border-b border-gray-200 hover:bg-gray-100">
                                    <td
                                        class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.placa}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.tipo}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.marca
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.color}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span class="font-medium">
                                                {{objeto.nombre}}
                                                {{objeto.apellido}}
                                                </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div
                                            class="flex item-center justify-center">
                                            <div
                                                class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="verVehi(objeto)">
                                                    
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="openActualizar(objeto)">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-rojito hover:scale-110">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="eliminarVehi"
                                                    >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mx-auto mt-12">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Placa
                                    </label>
                                    <input
                                        v-model="placa"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese placa del vehículo"/>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Marca
                                        </label>
                                        <input
                                            v-model="marca"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id=""
                                            type="text"
                                            placeholder="Ingrese la marca del vehículo"/>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Color
                                    </label>
                                    <input
                                        v-model="color"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese el color del vehículo"/>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 mb-1 xl:gap-6">
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Propietario
                                        </label>
                                        <select
                                            v-model="idPers"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayPersona" :key="index" :value="objeto.id">
                                                {{objeto.nombre}}
                                                {{objeto.apellido}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Tipo de vehículo
                                        </label>
                                        <select
                                            v-model="idTpVehi"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayTpVehi" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            N° de Parqueadero
                                        </label>
                                        <select
                                            v-model="idParq"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayParq" :key="index" :value="objeto.id">
                                                {{objeto.numero}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-1 mt-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Observaciones
                                        </label>
                                         <textarea
                                            v-model="edo"
                                            cols="53"
                                            rows="3"
                                            placeholder="Estado o condiciones del vehículo"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
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
                                @click="regVehiculo"
                                v-if="boton"
                                type="buttom"
                                class="pl-5 pr-5 bg-white border-2 text-xl border-green-800 text-verde pt-1 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                                Guardar
                            </button>
                            <button
                                @click="actualizarVehi"
                                v-if="boton==false"
                                type="buttom"
                                class="pl-5 pr-5 bg-white border-2 text-xl border-green-800 text-verde  pt-1 pb-1 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                                Actualizar
                            </button>
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
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div
                            class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster fixed
                             left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none
                              opacity-10%">
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
                                                Eliminar?
                                            </div>
                                            <p
                                                class="text-lg text-white leading-none mt-1">
                                                Para confirmar, click en el
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
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mx-auto mt-12">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Placa
                                    </label>
                                    <input
                                        v-model="placa"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese placa del vehículo"/>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Marca
                                        </label>
                                        <input
                                            v-model="marca"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id=""
                                            type="text"
                                            placeholder="Ingrese la marca del vehículo"/>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Color
                                    </label>
                                    <input
                                        v-model="color"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese el color del vehículo"/>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-3 mb-1 xl:gap-6">
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Propietario
                                        </label>
                                        <select
                                            v-model="idPers"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayPersona" :key="index" :value="objeto.id">
                                                {{objeto.nombre}}
                                                {{objeto.apellido}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Tipo de vehículo
                                        </label>
                                        <select
                                            v-model="idTpVehi"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayTpVehi" :key="index" :value="objeto.id">
                                                {{objeto.descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            N° de Parqueadero
                                        </label>
                                        <select
                                            v-model="idParq"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="estado">
                                            <option v-for="(objeto,index) in arrayParq" :key="index" :value="objeto.id">
                                                {{objeto.numero}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-1 mt-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Observaciones
                                        </label>
                                         <textarea
                                            v-model="edo"
                                            cols="53"
                                            rows="3"
                                            placeholder="Estado o condiciones del vehículo"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="500">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mt-9 ...">
                            <button
                                @click="cerrarReg"
                                type="buttom"
                                class="pl-5 pr-5 bg-white border-2 border-red-800 text-rojito  pt-1 text-xl rounded-lg hover:bg-rojito hover:text-white focus:border-3">
                                SALIR
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
            boton: "",
            placa: "",
            marca: "",
            color: "",
            idTpVehi: "",
            edo: "",
            idParq: "",
            idPers: "",
            idDet: 0,
            idVehi: 0,
            arrayTpVehi: [],
            arrayParq: [],
            arrayPersona: [],
            arrayData: [],
            arrayDetParq: []
        };
    },
    props: ["vehiculo"],
    methods: {
        listarDatos(){
            let me = this;
            var url = "/api/vehiculo/data"

            axios.get(url)
            .then(function(response){
                var respuesta = response.data;
                me.arrayData = respuesta.vehiculo;
            })
            .catch(function(error){
                console.log(error);
            })
        },
        abrirRegVehi() {
            this.tittle = "Crear vehículo";
            this.tpAccion = 1;
            this.boton = true;
            this.borrar();
        },
        regVehiculo() {
            let me= this;
            this.arrayDetParq.push({
            id_parq: this.idParq
            });
            var url="/api/vehiculo/registrar";
            axios.post(url,
            {
                placa: this.placa,
                marca: this.marca,
                color: this.color,
                edo: this.edo,
                idTpVehi: this.idTpVehi,
                idPers: this.idPers,
                data: this.arrayDetParq
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
        openActualizar(data=[]) {
            this.tpAccion = 1;
            this.boton = false;
            this.tittle = "Actualizar Vehículo";
            this.idVehi = data["idVehi"];
            this.placa = data["placa"];
            this.marca = data["marca"];
            this.color = data["color"];
            this.idTpVehi = data["idtpv"];
            this.edo = data["edo"];
            this.idParq = data["id_parq"];
            this.idPers = data["idper"];
            this.idDet = data["idDet"]
        },
        actualizarVehi() {
            let me= this;
            this.arrayDetParq.push({
            id_parq: this.idParq,
            idDet: this.idDet
            });
            var url="/api/vehiculo/actualizar";
            axios.put(url,
            {
                id: this.idVehi,
                placa: this.placa,
                marca: this.marca,
                color: this.color,
                edo: this.edo,
                idTpVehi: this.idTpVehi,
                idPers: this.idPers,
                data: this.arrayDetParq
            }
            ).then(function(response)
            {
                alert("Registro Actualizado exitosamente!");
                me.listarDatos();
                me.tpAccion=0;
                me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        verVehi(data=[]) {
             this.tpAccion = 3;
            this.boton = false;
            this.tittle = "información del Vehículo";
            this.idVehi = data["idVehi"];
            this.placa = data["placa"];
            this.marca = data["marca"];
            this.color = data["color"];
            this.idTpVehi = data["idtpv"];
            this.edo = data["edo"];
            this.idParq = data["placa"];
            this.idPers = data["idper"];
            this.idDet = data["idDet"]
        },
        eliminarVehi() {
            this.tpAccion=2;
            this.tittle="eliminar vehículo"
            alert("Botón inactivar ok");
        },
        listarTpVehi() {
        let me = this;
        var url = "/api/tpVehi/getTpVehi";

        axios
            .get(url)
            .then(function (response) {
            var respuesta = response.data;
            me.arrayTpVehi = respuesta.tpVehi;
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        listarNumParq() {
        let me = this;
        var url = "/api/parqueadero/getParq";

        axios
            .get(url)
            .then(function (response) {
            var respuesta = response.data;
            me.arrayParq = respuesta.parqueadero;
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        listarPersonas() {
            let me = this;
            var url = "/api/persona/getpersona";

            axios
                .get(url)
                .then(function (response) {
                var respuesta = response.data;
                me.arrayPersona = respuesta.persona;
                })
                .catch(function (error) {
                console.log(error);
                });
            },
        cerrarReg() {
            this.tpAccion = 0;
        },
        borrar(){
            this.placa= "",
            this.marca= "",
            this.color= "",
            this.idTpVehi= "",
            this.edo= "",
            this.idParq= "",
            this.idPers= ""
        },
    },
    mounted(){
        this.listarTpVehi();
        this.listarNumParq();
        this.listarPersonas();
        this.listarDatos();
    },
});

</script>
