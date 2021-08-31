import state from './State';

/** Mutations */
import * as new_mutations from './New/Mutations';
import * as list_mutations from './List/Mutations';
const mutations = {
    ...new_mutations,
    ...list_mutations
}

/** GETTERS  */
import * as new_getters from './New/Getters';
import * as list_getters from './List/Getters';
const getters = {
    ...new_getters, 
    ...list_getters
}

/** ACTIONS */
import * as edit_actions from './Edit/Actions';
import * as new_actions from './New/Actions';
import * as list_actions from './List/Actions';
const actions = {
    ...new_actions,
    ...list_actions,
    ...edit_actions
}

export default {
    actions,
    getters,
    mutations,
    state
}