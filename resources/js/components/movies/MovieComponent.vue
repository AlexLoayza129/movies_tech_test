<template>
    <div>
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-3xl text-center text-red-600 mb-2">Peliculas</h3>
            <a :href="createMovie" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Agregar una película</a>
        </div>
        <table class="bg-white rounded-md">
            <thead class="border-b-2 border-gray-500">
                <th class="p-4 ">#</th>
                <th class="p-4 ">UID</th>
                <th class="p-4 ">Nombre</th>
                <th class="p-4 ">Fecha de publicación</th>
                <th class="p-4 ">Estado</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <!-- Movie Counter -->
                <span class="hidden">{{ movieCounter = 1 }}</span>
                <!-- Movies -->
                <tr v-for="(movie, index) in listOfMovies" :key="index" class="hover:bg-gray-300">
                    <td v-if="movie.status == 1" class="p-4 text-center">{{ movieCounter++ }}</td>
                    <td v-if="movie.status == 1" class="p-4 text-center">{{ movie.id }}</td>
                    <td v-if="movie.status == 1" class="p-4 text-center">{{ movie.name }}</td>
                    <td v-if="movie.status == 1" class="p-4 text-center">{{ formatDate(movie.date_of_publish) }}</td>
                    <td v-if="movie.status == 1" class="p-4 text-center">
                        <span v-if="movie.active == 1" class="text-green-500 font-bold">
                            Activo
                        </span>
                        <span v-else class="text-red-600 font-bold">
                            Inactivo
                        </span>
                    </td>
                    <td v-if="movie.status == 1" class="p-4 flex justify-center items-center">
                        <!-- Is Active? -->
                        <form :action="changeStatus" method="POST">
                            <csrf-component></csrf-component>
                            <div v-if="movie.active == 1">
                                <input type="hidden" :value="movie.id" name="id">
                                <input type="hidden" value="0" name="newStatus">
                                <button type="submit">
                                    <svg class="w-4 h-4 fill-red-600 hover:fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                                </button>
                            </div>
                            <div v-else>
                                <input type="hidden" :value="movie.id" name="id">
                                <input type="hidden" value="1" name="newStatus">
                                <button type="submit">
                                    <svg class="w-4 h-4 fill-red-600 hover:fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80v48c0 17.7 14.3 32 32 32s32-14.3 32-32V144C576 64.5 511.5 0 432 0S288 64.5 288 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H352V144z"/></svg>
                                </button>
                            </div>
                        </form>
                    </td>
                    <td v-if="movie.status == 1" class="p-4">
                        <form :action="editMovie" method="POST">
                            <csrf-component></csrf-component>
                            <input type="hidden" name="id" :value="movie.id">
                            <button type="submit">
                                <svg class="w-4 h-4 fill-red-600 hover:fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M421.7 220.3l-11.3 11.3-22.6 22.6-205 205c-6.6 6.6-14.8 11.5-23.8 14.1L30.8 511c-8.4 2.5-17.5 .2-23.7-6.1S-1.5 489.7 1 481.2L38.7 353.1c2.6-9 7.5-17.2 14.1-23.8l205-205 22.6-22.6 11.3-11.3 33.9 33.9 62.1 62.1 33.9 33.9zM96 353.9l-9.3 9.3c-.9 .9-1.6 2.1-2 3.4l-25.3 86 86-25.3c1.3-.4 2.5-1.1 3.4-2l9.3-9.3H112c-8.8 0-16-7.2-16-16V353.9zM453.3 19.3l39.4 39.4c25 25 25 65.5 0 90.5l-14.5 14.5-22.6 22.6-11.3 11.3-33.9-33.9-62.1-62.1L314.3 67.7l11.3-11.3 22.6-22.6 14.5-14.5c25-25 65.5-25 90.5 0z"/></svg>
                            </button>
                        </form>
                    </td>
                    <td v-if="movie.status == 1" class="p-4">
                        <a :href="shifts">
                            <svg class="w-4 h-4 fill-red-600 hover:fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                        </a>
                    </td>
                    <td v-if="movie.status == 1" class="p-4">
                        <form :action="deleteMovie" method="POST">
                            <csrf-component></csrf-component>
                            <input type="hidden" name="id" :value="movie.id">
                            <button type="submit">
                                <svg class="w-4 h-4 fill-red-600 hover:fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios';
import moment from 'moment';
import CsrfComponent from '@/components/helpers/CsrfComponent.vue';

export default {
    components:{
        CsrfComponent
    },
    data(instance){
        return{
            createMovie: route('admin.movies.create'),
            listOfMovies: [],
            changeStatus: route('admin.movies.change'),
            deleteMovie: route('admin.movies.destroy'),
            editMovie: route('admin.movies.edit'),
            shifts: route('admin.shifts.index')
        }
    },
    methods:{
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY')
            }
        }
    },
    mounted () {
        axios
            .get('http://localhost:8000/api/movies')
                .then(response => (this.listOfMovies = response.data))
    }
}
</script>