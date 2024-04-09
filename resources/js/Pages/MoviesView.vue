<script setup>
import { ref, onMounted } from "vue";
let movies = ref([]);

function fetchMovies() {
    fetch("/api/v1/movies", {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'Content-Type': 'application/json'
            }
        })
        .then((response) => response.json())
        .then((data) => {
            // display a success message
            console.log(data);
            movies.value = data.movies;
        })
        .catch(function (error) {
            console.log(error);
        });
}

onMounted(() => fetchMovies())
</script>

<template>
    <h2>Movies</h2>
    <div class="row gy-4">
        <div v-for="movie in movies" :key="movie.id" class="col-md-6">
        <div class="card mb-3 h-100">
            <div class="row g-0">
                <div class="col-md-6">
                    <img :src="movie.poster" class="img-fluid rounded-start im-cover" alt="">
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <p class="card-text">{{ movie.title}}</p>
                        <p class="card-text">{{ movie.description}}</p>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    
    
</template>

<style scoped>
.im-cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>