<template>
    <div>
        <h3 class="text-red-600 text-2xl font-bold mb-2 text-center">Editar una película </h3>
        <form class="bg-white p-8 rounded-md max-w-[50vw] space-y-4" method="POST" :action="updateMovieForm" enctype="multipart/form-data">
            <csrf-component></csrf-component>
            <!-- ID of movie -->
            <input type="hidden" name="id" :value="movie.id">
            <!-- Nombre y fecha -->
            <div class="grid grid-cols-2 items-center space-x-4">
                <!-- Nombre de la pelicula-->
                <div>
                    <label for="name" class="text-red-600 text-sm font-bold">Nombre</label><br>
                    <input class="bg-white outline-none w-full border-b-2 border-gray-300" id="name" type="text" name="name" required placeholder="Nombre de la pelicula" :value="movie.name">
                </div>
                <!-- Fecha de publicacion -->
                <div>
                    <label for="date" class="text-red-600 text-sm font-bold">Fecha de publicación</label><br>
                    <input class="bg-white outline-none w-full border-b-2 border-gray-300" id="date" type="date" name="date" required :value="formatDate(movie.date_of_publish)"> 
                </div>
            </div>
            <!-- Current Image -->
            <p class="text-red-600 text-sm font-bold">Imagen de Referencia</p>
            <div class="flex justify-center">
                <img :src="'http://localhost:8000/storage/'+movie.img+'/Gpx6xF8wjIqSCKCqkMRNbkjjNXRU83asxmXtW5QZ.png'" alt="" class="max-w-[50%]">
            </div>
            <!-- Input submit -->
            <button class="bg-red-600 text-white w-full py-2 rounded-md hover:bg-red-700 transition-all ease-in-out duration-500" type="submit">Actualizar</button>
            <a :href="movieIndex" class="text-center bg-white text-red-600 hover:text-white transition-all ease-in-out duration-500 border-2 border-red-600 w-full py-2 rounded-md hover:bg-red-700" type="submit">Volver</a>
        </form>
    </div>
</template>
<script>
import CsrfComponent from '@/components/helpers/CsrfComponent.vue';
import DropzoneComponent from '@/components/helpers/DropzoneComponent.vue';
import axios from 'axios';
import moment from 'moment';

export default {
    components:{ CsrfComponent, DropzoneComponent},
    props:{ 
        id:{
            require: true
        }
    },
    data(){
        return{
            movieIndex: route('admin.movies.index'),
            movie: {},
            updateMovieForm: route('admin.movies.update'),
        }
    },
    methods:{
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('yyyy-MM-DD')
            }
        }
    },
    mounted(){
        axios
            .get(`http://localhost:8000/api/movies/${this.id}`)
                .then(response => (this.movie = response.data))
    }
}
</script>