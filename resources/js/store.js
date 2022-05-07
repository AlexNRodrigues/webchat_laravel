import axios from "axios"
import Vuex from "vuex"
import cretePersistedState from 'vuex-persistedstate'

export default new Vuex.Store({
    state: {
        user: {}
    },
    mutations: {
        setUserState: (state, value) => state.user = value
    },
    actions: {
        userStateAction: ({commit :commit}) => {
            axios.get('api/user/me').then(response => {
                const userResponse = response.data.user
                commit('setUserState', userResponse)
            })
        }
    },
    plugins: [
        cretePersistedState()
    ]   

})
