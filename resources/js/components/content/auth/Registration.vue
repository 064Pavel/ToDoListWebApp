<template>
    <div class="registration">
        <div class="registration-title">
            <div>
                <h2>Registration:</h2>
            </div>
        </div>
        <div class="registration-content">
            <input v-model="name" type="text" placeholder="Name">
            <input v-model="email" type="email" placeholder="Email">
            <input v-model="password" type="password" placeholder="Password">
            <input v-model="password_confirmation" type="password" placeholder="Password confirmation">
            <div class="login-link">
                <p>Do you already have an account?</p>
                <p><router-link :to="{ name: 'user.login' }">Log in</router-link></p>
            </div>
            <input @click.prevent="register" class="register-submit" type="submit" value="Sign up">
        </div>
    </div>
</template>

<script>
export default {
    name: "Registration",

    data(){
        return{
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }
    },

    methods: {
        register(){

            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation})
                        .then(response => {
                            console.log(response.data);
                        })
                })
        }
    }
}
</script>

<style scoped>
.registration {
    display: flex;
    flex-direction: column;
}

.registration-content input {
    margin: 10px;
    width: 200px;
}

.register-submit {
    background-color: lightseagreen;
    border: none;
    height: 30px;
}
</style>
