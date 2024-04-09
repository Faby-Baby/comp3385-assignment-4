<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const errorMessages = ref([]);

    function saveMovie() {
        let movieForm = document.getElementById('movieForm');
        let form_data = new FormData(movieForm);
        fetch("/api/v1/movies", {
            method: 'POST',
            body: form_data,
            headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
        .then(async response => {
            return response.json();
        })
        .then(function (data) {
            // display a success message
            router.push({path: '/movies'});
        })
        .catch(function (error) {
            
            console.log(error);
        });
    }

</script>

<template>
    <!-- <ul v-if="errorMessages.length">
        <li v-for="(message, index) in errorMessages" :key="index">{{ message }}</li>
    </ul> -->
    <form @submit.prevent="saveMovie" id="movieForm" enctype="multipart/form-data" action="" method="post">

        <div class="form-group mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="description" name="title" class="form-control" />
        </div>

        <div class="form-group mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group mb-3">
        <label for="poster" class="form-label">Poster</label>
        <input type="file" id="poster" name="poster" class="form-control" />
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</template>

<style scoped>
</style>