<template>
    <h1 class="main-title">Сменить пароль</h1>
    <div class="reg-form">
        <label class="reg-label">
            Логин
            <input type="text" placeholder="Введите логин" class="form-control">
        </label>
        <label class="reg-label">
            Имя
            <input type="text" placeholder="Введите имя" class="form-control">
        </label>
        <label class="reg-label">
            Почта
            <input type="email" placeholder="Введите почту" class="form-control">
        </label>
        <label class="reg-label">
            Пароль
            <input type="password" placeholder="Введите пароль" class="form-control">
        </label>
        <label class="reg-label">
            Пароль
            <input type="password" placeholder="Повторите пароль" class="form-control">
        </label>

        <label class="custom-checkbox">
            <input type="checkbox">
            <div class="custom-checkbox__text">
                Я полностью ознакомлен и принимаю <a href="#">правила</a> и <a href="#">лицензионное соглашение</a>, а также
                даю
                свое согласие на <a href="#">обработку
                    персональных данных</a>
            </div>
        </label>

        <!--        <div id="html_element"></div>-->
        <!--        <Checkbox />-->
        <input @click.prevent="register" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ" class="aside-auth__btn reg-btn">
    </div>
    <a href="http://localhost:8000/vk/auth">Регистрация через VK</a>
</template>

<script lang="ts">

</script>

<style></style>
