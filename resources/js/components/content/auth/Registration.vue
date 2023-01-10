<template>
    <div class="registration">
        <div class="registration-title">
            <div>
                <h2>Registration:</h2>
            </div>
        </div>
        <div class="registration-content">
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Password confirmation">
            <div class="login-link">
                <p>Do you already have an account?</p>
                <p><router-link :to="{ name: 'user.login' }">Log in</router-link></p>
            </div>
            <input class="register-submit" type="submit" value="Sign up">
        </div>
    </div>
</template>

<script>
export default {
    name: "Registration"
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
