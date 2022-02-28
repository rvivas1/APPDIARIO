<template>
    <app-layout title="Depositos">
        <template #header> </template>

        <!-- <h1 v-for="(objeto,index) in deposito" :key="index">
                        {{objeto.numero}}
                    </h1> -->
        <div v-if="tpAccion == 0" class="overflow-x-auto">
            <div
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden"
            >
                <sidebar />
                <div class="w-full lg:w-5/6">
                    <div
                        class="font-semibold mt-5 text-3xl ml-2 text-red-800 uppercase leading-tight">
                        <h1>gestionar depósitos</h1>
                    </div>
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div class="grid justify-items-end ...">
                            <button
                                type="button d-grid gap-1 d-md-flex"
                                @click="abrirReg"
                                class="pl-5 pr-6 bg-white border-2 border-rojito text-rojito mr-1 mt-2 text-xl rounded-lg hover:bg-verde hover:text-white focus:border-3"
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
                            class="border-l-4 border-white mt-2 min-w-max w-full margin-3 table-auto bg-gray-100 border-solid"
                        >
                            <thead>
                                <tr
                                    class="bg-gray-300 text-rojito uppercase text-normal text-xl leading-normal"
                                >
                                    <th class="py-3 px-6 text-left">N° Depósito</th>
                                    <th class="py-3 px-6 text-left">Titular</th>
                                    <th class="py-3 px-6 text-left">Ubicación</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-rojito text-lg font-light">
                                <tr
                                    v-for="(objeto, index) in arrayData"
                                    :key="index"
                                    class="border-b border-gray-200 hover:bg-gray-100"
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
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.repre_propie
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{
                                                objeto.ubicacion
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span
                                            v-if="objeto.estado == 1"
                                            class="bg-purple-200 text-green-600 py-1 px-3 rounded-full text-base"
                                            >Activo</span
                                        >
                                        <span
                                            v-else
                                            class="bg-purple-200 text-red-600 py-1 px-3 rounded-full text-base"
                                            >Inactivo</span
                                        >
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div
                                            class="flex item-center justify-center"
                                        >
                                            <div
                                                class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="verDep(objeto)"
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
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="openActualizar(objeto)"
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
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    @click="inactDep"
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
                class="bg-gray-200 flex ml-6 justify-center bg-gray-100 font-sans overflow-hidden">
                <sidebar />
                <div class="lg:w-5/6">
                    <div class="bg-grey-200 shadow-md rounded my-6">
                        <div
                            class="font-semibold mt-5 text-3xl ml-2 text-rojito uppercase leading-tight">
                            <h2 v-text="tittle"></h2>
                        </div>
                        <div class="max-w-5xl mt-12 mx-auto">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg rounded font-bold text-rojito"
                                        for="">
                                        Número
                                    </label>
                                    <input
                                        v-model="numero"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese el número de depósito"/>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Ubicación
                                    </label>
                                    <input
                                        v-model="ubic"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="ubic"
                                        type="text"
                                        placeholder="Ingrese la ubicación del depósito"/>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Medidas
                                    </label>
                                    <input
                                        v-model="medidas"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="text"
                                        placeholder="Ingrese medidas en M2"/>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 mb-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito">
                                            Titular
                                        </label>
                                        <input
                                            v-model="repProp"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id=""
                                            type="text"
                                            placeholder="Representante legal"/>
                                    </div>
                                </div>
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            N° Oficina / Local
                                        </label>
                                        <select
                                            v-model="idOfLoc"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="">
                                            <option v-for="(objeto,index) in arrayOfiLoc" :key="index" :value="objeto.id">
                                                {{objeto.numero}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 mb-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-1 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Estado del depósito
                                        </label>
                                        <textarea
                                            v-model="cond"
                                            name="body"
                                            cols="53"
                                            rows="3"
                                            placeholder="Condiciones fisicas del depósito"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-lg font-bold text-rojito"
                                            for="">
                                            Contenido del depósito
                                        </label>
                                        <textarea
                                            v-model="cont"
                                            name="body"
                                            cols="53"
                                            rows="3"
                                            placeholder="Contenido del depósito"
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Disponible para
                                    </label>
                                    <div
                                        class="main flex mt-1 border overflow-hidden select-none">
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight text-lg">
                                            <input
                                                v-model="dispAlq"
                                                value="1"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name=""
                                                checked/>
                                            <div class="title text-rojito px-2 my-auto">
                                                Alquiler
                                            </div>
                                        </label>
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight text-lg">
                                            <input
                                                v-model="dispVent"
                                                value="0"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name=""
                                                checked/>
                                            <div class="title text-rojito px-2 my-auto">
                                                Venta
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-lg font-bold text-rojito"
                                        for="">
                                        Estado
                                    </label>
                                    <div
                                        class="main flex border mt-0 rounded-full overflow-hidden select-none">
                                        <label
                                            class="flex radio p-2 cursor-pointer">
                                            <input
                                                v-model="edo"
                                                value="1"
                                                class="my-auto transform scale-125"
                                                type="radio"
                                                name="sfg"/>
                                            <div
                                                class="ml-3 text-rojito text-lg font-medium">
                                                Activo
                                            </div>
                                        </label>
                                        <label
                                            class="flex radio p-2 cursor-pointer">
                                            <input
                                                v-model="edo"
                                                value="0"
                                                class="my-auto transform scale-125"
                                                type="radio"
                                                name="sfg"/>
                                            <div
                                                class="ml-3 text-rojito text-lg font-medium">
                                                Inactivo
                                            </div>
                                        </label>
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
                                v-if="boton"
                                @click="regDeposito"
                                type="buttom"
                                class="pl-5 pr-5 bg-white border-2 text-xl border-green-800 text-verde pt-1 text-lg rounded-lg hover:bg-verde hover:text-white focus:border-3">
                                Guardar
                            </button>
                            <button
                                v-if="boton==false"
                                @click="actualizarDep"
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
                                                Inactivar?
                                            </div>
                                            <p
                                                class="text-lg text-white leading-none mt-1">
                                                Para inactivar, click en el
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
                        <div class="max-w-5xl mt-12 mx-auto">
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl rounded font-bold text-rojito"
                                        for="">
                                        Número
                                    </label>
                                    <input
                                        v-model="numero"
                                        disabled
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="label"/>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl font-bold text-rojito"
                                        for="">
                                        Ubicación
                                    </label>
                                    <input
                                        v-model="ubic"
                                        disabled
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="ubic"
                                        type="label"/>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl font-bold text-rojito"
                                        for="">
                                        Medidas
                                    </label>
                                    <input
                                        v-model="medidas"
                                        disabled
                                        class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id=""
                                        type="label"/>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 mb-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito">
                                            Titular
                                        </label>
                                        <input
                                            v-model="repProp"
                                            disabled
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id=""
                                            type="label"/>
                                    </div>
                                </div>
                                <div
                                    class="flex sm:flex-row items-center mb-2 sm:space-x-5">
                                    <div class="w-full md:mr-2">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito"
                                            for="">
                                            N° Oficina / Local
                                        </label>
                                        <select
                                            v-model="idOfLoc"
                                            disabled
                                            class="w-full px-3 py-2 text-xl leading-tight text-rojito border rounded shadow focus:outline-none focus:shadow-outline"
                                            name="">
                                            <option v-for="(objeto,index) in arrayOfiLoc" :key="index" :value="objeto.id">
                                                {{objeto.numero}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 mb-1 xl:gap-6">
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-1 md:mb-0">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito"
                                            for="">
                                            Estado del depósito
                                        </label>
                                        <textarea
                                            v-model="cond"
                                            disabled
                                            name="body"
                                            cols="53"
                                            rows="3"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mb-2 md:mb-0">
                                    <div class="mb-1 md:mr-2 md:mb-0">
                                        <label
                                            class="block mt-2 text-2xl font-bold text-rojito"
                                            for="">
                                            Contenido del depósito
                                        </label>
                                        <textarea
                                            v-model="cont"
                                            disabled
                                            name="body"
                                            cols="53"
                                            rows="3"
                                            class="w-full px-3 py-2 text-lg leading-tight text-rojito border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            maxlength="600">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl font-bold text-rojito"
                                        for="">
                                        Disponible para
                                    </label>
                                    <div
                                        class="main flex mt-1 border rounded-full overflow-hidden select-none">
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight ">
                                            <input
                                                v-model="dispAlq"
                                                disabled
                                                value="1"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name=""
                                                checked/>
                                            <div class="title text-xl text-rojito px-2 my-auto">
                                                Alquiler
                                            </div>
                                        </label>
                                        <label
                                            class="flex radio p-2 cursor-pointer font-extralight ">
                                            <input
                                                v-model="dispVent"
                                                disabled
                                                value="1"
                                                class="my-auto transform scale-125"
                                                type="checkbox"
                                                name=""
                                                checked/>
                                            <div class="title text-xl text-rojito px-2 my-auto">
                                                Venta
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label
                                        class="block mt-2 text-2xl font-bold text-rojito"
                                        for="">
                                        Estado
                                    </label>
                                    <div
                                        class="main flex border mt-0 rounded-full overflow-hidden select-none">
                                        <label
                                            class="flex radio p-2 cursor-pointer">
                                            <input
                                                v-model="edo"
                                                disabled
                                                value="1"
                                                class="my-auto transform scale-125"
                                                type="radio"
                                                name="sfg"/>
                                            <div
                                                class="ml-3 text-rojito text-xl font-medium">
                                                Activo
                                            </div>
                                        </label>
                                        <label
                                            class="flex radio p-2 cursor-pointer">
                                            <input
                                                v-model="edo"
                                                disabled
                                                value="0"
                                                class="my-auto transform scale-125"
                                                type="radio"
                                                name="sfg"/>
                                            <div
                                                class="ml-3 text-rojito text-xl font-medium">
                                                Inactivo
                                            </div>
                                        </label>
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
            boton: true,
            numero: "",
            ubic: "",
            repProp: "",
            cond: "",
            cont: "",
            edo: 1,
            medidas: "",
            dispVent: false,
            dispAlq: false,
            idOfLoc: 0,
            idDep: 0,
            arrayOfiLoc: [],
            arrayData: [],

        };
    },
    // props: ["deposito"],
    methods: {
        listarDatos(){
            let me = this;
            var url="/api/deposito/main"

            axios.get(url)
            .then(function(response) {
                var respuesta=response.data;
                me.arrayData = respuesta.deposito;
            })
            .catch(function(error){
                console.log(error);
            })
        },
        abrirReg() {
            this.tittle = "Crear Depósito";
            this.tpAccion = 1;
            this.boton = true;
            this.borrar();
        },
        regDeposito() {
             let me= this;
            var url="/api/deposito/registrar";
            axios.post(url,
            {
                numero: this.numero,
                ubic: this.ubic,
                repProp: this.repProp,
                cond: this.cond,
                cont: this.cont,
                edo: this.edo,
                medidas: this.medidas,
                dispVent: this.dispVent,
                dispAlq: this.dispAlq,
                idOfLoc: this.idOfLoc,
            }
            ).then(function(response)
            {
                alert("Registro guardado exitosamente!");
                me.listarDatos();
                me.tpAccion=0;
                // me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        openActualizar(data=[]) {
            if(data['disp_venta']=="1")
            this.dispVent=true;
            else
            this.dispVent=false
            if(data['disp_alquiler']=="1")
            this.dispAlq=true;
            else
            this.dispAlq=false;
            
            this.tpAccion = 1;
            this.tittle = "Actualizar Depósito";
            this.boton=false;
            this.idDep =data["id"];
            this.numero = data["numero"];
            this.ubic = data["ubicacion"];
            this.repProp = data["repre_propie"];
            this.cond = data["condicion"];
            this.cont = data["contenido"];
            this.edo = data["estado"];
            this.medidas = data["medidas"];
            this.idOfLoc = data["id_ofLoc"];
            // this.dispVent = data["disp_venta"];
            // this.dispAlq = data["disp_alquiler"];
        },
        actualizarDep() {
             let me= this;
            var url="/api/deposito/actualizar";
            axios.put(url,
            {
                id: this.idDep,
                numero: this.numero,
                ubic: this.ubic,
                repProp: this.repProp,
                cond: this.cond,
                cont: this.cont,
                edo: this.edo,
                medidas: this.medidas,
                dispVent: this.dispVent,
                dispAlq: this.dispAlq,
                idOfLoc: this.idOfLoc,
            }
            ).then(function(response)
            {
                alert("Registro actualizado exitosamente!");
                me.listarDatos();
                me.tpAccion=0;
                me.borrar();
            })
            .catch(function(error){
                console.log(error.message);
            })
        },
        verDep(data=[]) {
             if(data['disp_venta']=="1")
            this.dispVent=true;
            else
            this.dispVent=false
            if(data['disp_alquiler']=="1")
            this.dispAlq=true;
            else
            this.dispAlq=false;
             this.tpAccion = 3;
            this.tittle = "Informacion del Depósito";
            this.boton=false;
            this.idDep =data["id"];
            this.numero = data["numero"];
            this.ubic = data["ubicacion"];
            this.repProp = data["repre_propie"];
            this.cond = data["condicion"];
            this.cont = data["contenido"];
            this.edo = data["estado"];
            this.medidas = data["medidas"];
            // this.dispVent = data["disp_venta"];
            // this.dispAlq = data["disp_alquiler"];
            this.idOfLoc = data["id_ofLoc"];
        },
        inactDep() {
            this.tpAccion=2;
            this.tittle="inactivar depósito"
            alert("Botón inactivar ok");
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
            this.numero="",
            this.ubic= "",
            this.repProp= "",
            this.cond= "",
            this.cont= "",
            this.medidas= "",
            this.dispVent= false,
            this.dispAlq= false,
            this.idOfLoc= "",
            this.idDep= 0
        },
        cerrarReg() {
            this.tpAccion = 0;
            this.borrar();
        },
    },
    mounted(){
        this.listarOfiLoc();
        this.listarDatos();
    }
});
</script>
