const state = {
    categories: []
};

const mutations = {
    SET_CATEGORY(state, categories) {
        state.categories = categories;
    }
};

const actions = {
    setCategory: ({ commit }, categories) => {
        commit("SET_CATEGORY", categories);
    }
};

const getters = {
    categories: state => {
        return state.categories;
    }
};

export default {
    state,
    mutations,
    actions,
    getters
};
