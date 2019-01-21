<template>
    <div>
        <input class="form-control" id="searchbox" placeholder="Type your name here..." type="text" v-model="keywords" autocomplete="off">

        <div class="list-group" v-if="results.length > 0">
            <a href="#" class="list-group-item list-group-item-action" v-for="result in results" :key="result.id" v-text="result.name" v-on:click="setNewValue"></a>
        </div>

        <button v-on:click="setNewValue">Set new value</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: []
        };
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/api/search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        },
        setNewValue: function () {
            console.log('Component Test.');
            this.keywords = this.result;
        }
    }
}
</script>