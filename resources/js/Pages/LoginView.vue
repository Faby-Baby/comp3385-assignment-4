<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();
let message = ref('');
function Login() {
    let loginForm = document.getElementById('loginForm');
    let form_data = new FormData(loginForm);
    
    fetch("/api/v1/login", {
        method: 'POST',
        body: form_data,
        headers: {
            'Accept': 'application/json'
        }
        
    }).then(response => {
        if (!response.ok) {
            throw new Error('Incorrect/Missing login details')
        }
        return response.json();
    }).then(data => {  

        localStorage.setItem('token', data.access_token);
        router.push({path: '/movies'});
    }).catch(error => {
        message.value = error.message;
        console.error(error);

    });

}

</script>

<template>


<div v-if="message">
<p class="alert alert-danger">{{ message }}</p>
</div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form @submit.prevent="Login" id="loginForm" action="" method="post">
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="johndoe@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<style scoped>
</style>