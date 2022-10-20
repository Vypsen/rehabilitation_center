import {createStore} from 'vuex';

 const store = createStore({
    state: {
        user:{
            data:{},
            token: sessionStorage.getItem("TOKEN"),
        }
    },
    getters: {},
    mutations: {
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
        },
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.token = userData.user;
        }
    },
    actions: {
        register({commit}, user){
            console.log(user)
            axios
                .post("http://localhost:80/api/auth/register",
                    user
                )
                .then(response => {
                    console.log("response", response);
                })
                .then(response => {
                    commit("setUser", user);
                    return response;
                })
                .catch(error => {
                    console.log("error", error);
                });
        },
    },
    modules: {},
});

export default store;
