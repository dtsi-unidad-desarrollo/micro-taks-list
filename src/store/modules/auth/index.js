import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

export default {
    namespaced: true,
    state() {
        return {
            name : 'el bicho',
        };
    },
    mutations : mutations,
    getters : getters,
    actions : actions,
};