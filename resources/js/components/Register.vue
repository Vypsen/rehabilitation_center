<template>
    <div>
        <!--          <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />-->
        <h2 class="mt-2 text-center text-3xl font-bold tracking-tight text-black">Создать новый аккаунт</h2>
        <p class="mt-2 text-center text-sl font-bold text-gray-800">
            Или
            {{ ' ' }}
            <router-link :to="{name: 'Login'}" class="font-medium text-indigo-500 hover:text-indigo-300">
                Войти в аккаунт
            </router-link>
        </p>
    </div>
    <form class="mt-3 space-y-6" @submit="register">
        <div class=" rounded-md shadow-sm">
            <div class="mb-1">
                <label for="email-address" class="sr-only">Фамилия</label>
                <input v-model="user.lastname" required=""
                       class="shadow-inner bg-gray-200 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Фамилия"/>
            </div>
            <div class="mb-1">
                <label for="name-user" class="sr-only">Имя</label>
                <input v-model="user.name" required=""
                       class="shadow-inner bg-gray-200 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Имя"/>
            </div>
            <div class="mb-1">
                <label for="email-address" class="sr-only">Отчество</label>
                <input v-model="user.patronymic" required=""
                       class=" shadow-inner bg-gray-100 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Отчество"/>
            </div>
            <div class="shadow-inner bg-gray-100 mb-1 pl-2 pb-1 border rounded-md border-solid border-gray-300">
                <label class="text-sl text-gray-800"> Пол </label> <br>
                <label for="email-address" class="sr-only">Пол</label>
                <input value="1" v-model="user.sex"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioMan" id="flexRadioMan">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioMan">
                    Мужской
                </label>
                <br>
                <input value="0" v-model="user.sex"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioWoman" id="flexRadioWoman">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioWoman">
                    Женский
                </label>
            </div>
            <div class=" shadow-inner bg-gray-100 mb-1 pl-2 pb-1 border rounded-md border-solid border-gray-300">
                <label class="text-sl text-gray-800"> Заболевание </label> <br>
                <label for="email-address" class="sr-only">Заболевание</label>
                <input value="1" v-model="user.disease"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioInsult" id="flexRadioInsult">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioInsult">
                    Инсульт
                </label>
                <br>
                <input value="0" v-model="user.disease"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioOther" id="flexRadioOther">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioOther">
                    Другое
                </label>
            </div>
            <div v-show="user.disease==='Инсульт'"
                 class="shadow-inner bg-gray-100 mb-1 pl-2 pb-1 border rounded-md border-solid border-gray-300">
                <label class="text-sl text-gray-800"> Разновидность инсульта </label> <br>
                <label for="email-address" class="sr-only">Разновидность инсульта</label>
                <input value="1" v-model="user.insultType"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioRight" id="flexRadioRight">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioRight">
                    Правое
                </label>
                <br>
                <input value="0" v-model="user.insultType"
                       class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-500 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                       type="radio" name="flexRadioLeft" id="flexRadioLeft">
                <label class="form-check-label inline-block text-gray-700 text-sm" for="flexRadioLeft">
                    Левое
                </label>
            </div>
            <div class="mb-1">
                <label for='phone' class="sr-only">Номер телефона</label>
                <input v-model="user.number_phone" id="phone"
                       class=" shadow-inner bg-gray-100 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Номер телефон" required>
            </div>
            <div class="mb-1">
                <label for="date_of_birth" class="sr-only">Дата рождения</label>
                <input v-model="user.date_of_birth" type="date" id="date_of_birth"
                       class=" shadow-inner bg-gray-100 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       required>
            </div>
            <div class="mb-1">
                <label for="email-address" class="sr-only">Email address</label>
                <input v-model="user.email" id="email-address" name="email" type="email" autocomplete="email"
                       required=""
                       class="shadow-inner bg-gray-100 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Адрес электронной почты"/>
            </div>
            <div class="mb-1">
                <label for="password" class="sr-only">Password</label>
                <input v-model="user.password" id="password" name="password" type="password"
                       autocomplete="current-password" required=""
                       class="shadow-inner bg-gray-100 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                       placeholder="Придумайте пароль"/>
            </div>
        </div>
        <Alert
            v-if="Object.keys(errors).length"
            class="flex-col items-stretch text-sm">
            <div v-for="(field, i) of Object.keys(errors)" :key="i">
                <div v-for="(error, ind) of errors[field] || []" :key="ind">
                    * {{ error }}
                </div>
            </div>
        </Alert>
        <div>
            <button type="submit"
                    class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Зарегистрироваться
            </button>
        </div>
    </form>
</template>

<script setup>
import {ref} from 'vue'
import store from '../store'
import {useRouter} from "vue-router"
import Alert from "../components/Alert.vue";


const router = useRouter();

let user = ref({
    name: '',
    lastname: '',
    patronymic: '',
    sex: '',
    date_of_birth: '',
    number_phone: '',
    disease: '',
    insultType: '',
    email: '',
    password: ''
})

const loading = ref(false);
const errors = ref({});

function register(ev) {
    ev.preventDefault();
    if (user.value.disease === 'Другое') {
        user.value.insultType = ''
    }
    console.log(user)
    store
        .dispatch('register', user.value)
        .then(() => {
            router.push({
                name: 'Dashboard'
            })
        })
        .catch((error) => {
            loading.value = false;
            if (error.response.status === 422) {
                errors.value = error.response.data;
            }
        });
    console.log(1111111111)
}
</script>
