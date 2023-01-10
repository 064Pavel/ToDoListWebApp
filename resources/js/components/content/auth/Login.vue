<template>
    <div class="login">
        <div class="login-title">
            <div><h2>Login:</h2></div>
        </div>
        <div class="login-content">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <input class="login-submit" type="submit" value="Sign in">
            <div class="registration-link">
                <p>Don't you have an account yet?</p>
                <p><router-link :to="{ name: 'user.registration' }">Register</router-link></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login"
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
