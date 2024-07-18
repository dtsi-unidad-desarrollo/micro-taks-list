import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

export default {
    namespaced: true,
    state() {
        return {
            name : 'Pseudo-trello',
        };
    },
    mutations : mutations,
    getters : getters,
    actions : actions,
};