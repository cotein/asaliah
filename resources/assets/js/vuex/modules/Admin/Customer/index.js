import state from './State';

import * as search_actions from './Search/Actions';
import * as list_actions from './List/Actions';

const actions = {
    ...search_actions,
    ...list_actions,
}

import * as list_getters from './List/Getters';
import * as new_getters from './New/Getters';

const getters = {
    ...list_getters,
    ...new_getters,
}

import * as list_mutations from './List/Mutations';
import * as new_mutations from './New/Mutations';

const mutations = {
    ...list_mutations,
    ...new_mutations
}

export default {
    actions,
    getters,
    mutations,
    state
}