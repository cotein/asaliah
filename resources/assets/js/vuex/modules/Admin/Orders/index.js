import state from './State';

import * as new_getters from './New/Getters';

const getters = {
    ...new_getters,
}    

import * as new_mutations from './New/Mutations';

const mutations = {
    ...new_mutations,
}

import * as new_actions from './New/Actions';

const actions = {
    ...new_actions,
}

export default {
    state,
    mutations,
    getters,
    actions

}