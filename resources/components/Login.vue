<template>
        <div>
          <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
          <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Войти в свой личный кабинет</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Или
                {{ ' ' }}
                <router-link :to="{name: 'Register'}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Создать новый аккаунт
                </router-link>
            </p>
        </div>
        <form class="mt-8 space-y-6"  @submit="login">
          <input type="hidden" name="remember" value="true" />
          <div class="-space-y-px rounded-md shadow-sm">
            <div class="pb-1">
              <label for="email-address" class="sr-only">Email address</label>
              <input v-model="user.email" id="email-address" name="email" type="email" autocomplete="email" required=""
                     class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Адрес электронной почты"/>
            </div>
            <div>
              <label for="password" class="sr-only">Password</label>
              <input v-model="user.password" id="password" name="password" type="password" autocomplete="current-password" required=""
                     class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Пароль" />
            </div>
          </div>
          <div>
            <button type="submit"
                    class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              Войти
            </button>
          </div>
        </form>
  </template>

<script setup>
import store from '../store/index'
import {useRouter} from "vue-router"

const router = useRouter();
const user = {
    email: '',
    password: ''
};

function login(ev) {
    ev.preventDefault();
    store
        .dispatch('login', user)
        .then(() => {
            router.push({
                name: 'Dashboard'
            })
        })

}
</script>
