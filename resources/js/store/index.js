import { createStore } from 'vuex'

const store = createStore({
    state: {
        userToken: '',
        isUserLogin: 0,
        user: {},
    },

})
export default store
