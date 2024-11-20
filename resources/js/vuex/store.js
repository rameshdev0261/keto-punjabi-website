// import { createStore } from "vuex"
// import { createApp } from 'vue';

// import Vue from 'vue'
import Vue from 'vue'
import Vuex from 'vuex'
import { axios } from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
    state() {
        return {
            count: 0,
        };
    },
    getters: {},
    actions: {
        
        getRequest(context, item) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/'+item.url)
                    .then((response) => resolve(response))
                    .catch(() => reject);
            });
        },
    },
    mutations: {
        increment(state) {
            state.count++;
            alert(state.count)
        },
    },
  });

  

 

 