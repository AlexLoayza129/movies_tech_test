<template>
    <div>
        <div>
            <label for="file" class="text-red-600 text-sm font-bold">Imagen de la pelicula</label><br>
            <div class="flex justify-center mt-2">
                <label for="file" class="w-[100%] h-full p-4 border border-dotted border-red-600">
                    <p class="text-center text-red-600">Sube un archivo</p>
                    <div class="flex justify-center my-2">
                        <svg class="fill-red-600 w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
                    </div>
                    <input type="file" name="file" id="file" class="hidden">
                </label>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'DropzoneComponent'
    }
</script>