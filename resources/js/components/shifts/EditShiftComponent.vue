<template>
    <div>
        <h3 class="text-red-600 text-2xl font-bold mb-2 text-center">Editar un turno </h3>
        <form class="bg-white p-8 rounded-md max-w-[50vw] space-y-4" method="POST" :action="updateShiftForm">
            <csrf-component></csrf-component>
            <!-- ID del turno -->
            <input type="hidden" name="id" :value="shift.id">
            <!-- Nombre y fecha -->
            <div class="grid grid-cols-2 items-center space-x-4">
                <!-- Nombre de la pelicula-->
                <div>
                    <label for="name" class="text-red-600 text-sm font-bold">Nombre de la pelicula</label><br>
                    <input disabled class="bg-white outline-none w-full border-b-2 border-gray-300 text-gray-300" id="name" type="text" name="name" required placeholder="Nombre de la pelicula" :value="shift.movie_name">
                </div>
                <!-- Hora del turno -->
                <div>
                    <label for="date" class="text-red-600 text-sm font-bold">Hora del turno</label><br>
                    <input class="bg-white outline-none w-full border-b-2 border-gray-300" id="time" type="time" name="time" required :value="formatDate(shift.time)"> 
                </div>
            </div>
            <!-- Is Active -->
            <div>
                <div v-if="shift.active == 1" class="flex items-center space-x-2">
                    <input type="checkbox" name="isActive" id="isActive" value="true" checked><label for="isActive" class="text-red-600">¿Esta activo?</label>
                </div>
                <div v-else class="flex items-center space-x-2">
                    <input type="checkbox" name="isActive" id="isActive" value="true" checked><label for="isActive" class="text-red-600">¿Esta activo?</label>
                </div>
            </div>
            <!-- Input submit -->
            <button class="bg-red-600 text-white w-full py-2 rounded-md hover:bg-red-700 transition-all ease-in-out duration-500" type="submit">Actualizar</button>
            <a :href="shiftIndex" class="text-center bg-white text-red-600 hover:text-white transition-all ease-in-out duration-500 border-2 border-red-600 w-full py-2 rounded-md hover:bg-red-700" type="submit">Volver</a>
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
            shiftIndex: route('admin.shifts.index'),
            shift: {},
            updateShiftForm: route('admin.shifts.update'),
        }
    },
    methods:{
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('HH:mm')
            }
        }
    },
    mounted(){
        axios
            .get(`http://localhost:8000/api/shifts/${this.id}`)
                .then(response => (this.shift = response.data))
    }
}
</script>