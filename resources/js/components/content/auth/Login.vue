<template>
    <div class="login">
        <div class="login-title">
            <div><h2>Login:</h2></div>
        </div>
        <div class="login-content">
            <input v-model="email" type="email" placeholder="Email">
            <input v-model="password" type="password" placeholder="Password">
            <div class="registration-link">
                <p>Don't you have an account yet?</p>
                <p><router-link :to="{ name: 'user.registration' }">Register</router-link></p>
            </div>
            <input @click.prevent="login" class="login-submit" type="submit" value="Sign in">
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",

    data(){
        return{
            email: '',
            password: ''
        }
    },

    methods: {

        login(){
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log(this.email, this.password);
                    axios.post('/login', {email: this.email, password: this.password})
                    .then(response => {
                        console.log(response);
                    })
            })
        }

    }
}
</script>

<style scoped>
    .login{
        display: flex;
        flex-direction: column;
    }

    .login-content input{
        margin: 10px;
        width: 200px;
    }

    .login-submit{
        background-color: lightseagreen;
        border: none;
        height: 30px;
    }
</style>
