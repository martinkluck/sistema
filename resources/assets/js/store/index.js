import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const state = {
    data: []
}

const mutations = {
    RECEIVE_PRODUCTS (state, { products }) {
        state.data = products
    }
}

const actions = {
    async FETCH_PRODUCTS ({ commit }, name) {
        const url = '/get-products'
        const { data } = await axios.get(url)
        commit('RECEIVE_PRODUCTS', { products: data.results })
    }
}

const getters = {
    products: state => {
        return state.data.map(data => {
            return {
                name: data.name,
                description: data.description
            }
        })
    }
}

const store = new Vuex.Store({
    state,
    mutations,
    actions,
    getters
})

export default store
