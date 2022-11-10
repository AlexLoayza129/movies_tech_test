<template>
    <div>
        <h3 class="text-red-600 text-2xl font-bold mb-2 text-center">Agregar un turno </h3>
        <form class="bg-white p-8 rounded-md min-w-[50vw] space-y-4" method="POST" :action="createShiftForm" enctype="multipart/form-data">
            <csrf-component></csrf-component>
            <!-- Nombre y fecha -->
            <div class="grid grid-cols-2 items-center space-x-4">
                <!-- Nombre de la pelicula-->
                <div>
                    <label for="date" class="text-red-600 text-sm font-bold">Nombre</label><br>
                    <input class="bg-white outline-none w-full border-b-2 border-gray-300" id="name" type="text" name="name" required placeholder="Nombre de la pelicula">
                </div>
                <!-- Fecha de publicacion -->
                <div>
                    <label for="date" class="text-red-600 text-sm font-bold">Hora del turno</label><br>
                    <input class="bg-white outline-none w-full border-b-2 border-gray-300" id="date" type="time" name="time" required>
                </div>
            </div>
            <!-- Is Active -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="isActive" id="isActive" value="true"><label for="isActive" class="text-red-600">¿Esta activo?</label>
            </div>
            <!-- Input submit -->
            <button class="bg-red-600 text-white w-full py-2 rounded-md hover:bg-red-700 transition-all ease-in-out duration-500" type="submit">Agregar</button>
            <a :href="shiftIndex" class="text-center bg-white text-red-600 hover:text-white transition-all ease-in-out duration-500 border-2 border-red-600 w-full py-2 rounded-md hover:bg-red-700" type="submit">Volver</a>
        </form>
    </div>
</template>
<script>
import CsrfComponent from '@/components/helpers/CsrfComponent.vue';
import DropzoneComponent from '@/components/helpers/DropzoneComponent.vue';
export default {
    components:{ CsrfComponent, DropzoneComponent},
    data(){
        return{
            createShiftForm: route('admin.shifts.store'),
            shiftIndex: route('admin.shifts.index'),
        }
    }
}
</script>