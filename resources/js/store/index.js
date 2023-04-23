import {createStore} from 'vuex';
import createPersistedState from 'vuex-persistedstate'

const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        }
    },
    getters: {},
    mutations: {
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            sessionStorage.removeItem("TOKEN")
        },
        setUser: (state, userData) => {
            state.user.data = userData.user
            state.user.token = userData.authToken;
            sessionStorage.setItem("TOKEN", userData.authToken)
        }
    },
    actions: {
        async register({commit}, user) {
            console.log(user)

            let req = await axios
                .post("http://app.local/api/auth/register",
                    user
                )
                .then(function (response) {
                    console.log(response);
                })
            commit("setUser", req.data);
        },
        async login({commit}, user) {
            console.log(user)
            try {
                let req = await axios
                    .post("http://localhost:80/api/auth/login",
                        user
                    )
                    .then(function (response) {
                        console.log(response);
                    })
                commit("setUser", req.data);
            } catch (error) {
                console.log("error", error);
            }
        },
        async logout({commit}) {
            try {
                let req = await axios.post("http://localhost:80/api/logout")
                commit("logout");
                return req;
            } catch (error) {
                console.log("error", error);
            }
        },
        async getUser({commit}) {
            try {
                let req = await axios.post("http://localhost:80/api/user")
                commit("setUser", req.data);
                return req;
            } catch (error) {
                console.log("error", error);
            }
        },
    },
    modules: {},
    plugins: [
        createPersistedState()
    ]
});

export default store;
