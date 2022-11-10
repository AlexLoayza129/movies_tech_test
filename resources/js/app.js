import { createApp } from 'vue';

import MainComponent from './components/MainComponent.vue';

//Movies
import MovieComponent from './components/movies/MovieComponent.vue';
import CreateMovieComponent from './components/movies/CreateMovieComponent.vue';
import EditMovieComponent from './components/movies/EditMovieComponent.vue';
//Shifts
import ShiftComponent from './components/shifts/ShiftComponent.vue';
import CreateShiftComponent from './components/shifts/CreateShiftComponent.vue';
import EditShiftComponent from './components/shifts/EditShiftComponent.vue';
import './utilities'

const app = createApp({
    // delimiters: ['@@', '@@'],
    components: { MainComponent , MovieComponent, CreateMovieComponent, EditMovieComponent, ShiftComponent, CreateShiftComponent, EditShiftComponent}
}).mount('#app');

