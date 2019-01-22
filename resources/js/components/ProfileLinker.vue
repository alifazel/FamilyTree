<template>
    <!-- Parent Element -->
    <div class="profileSearch">
        <!-- Form Group -->
        <div class="form-group">
            <div class="input-group mb-3">
                <!-- Search Box -->
                <input class="form-control" placeholder="Type your name here..." type="text" v-model="keywords" autocomplete="off"  v-on:input="onTyping">
                <!-- Clear Button -->
                <div class="input-group-append">
                    <button class="btn  btn-secondary" type="button" :disabled="keywords == null || keywords == ''" v-on:click="clearSearch">Clear</button>
                </div>
                <!-- Autocomplete Box -->
                <div class="dropdown-menu" v-if="results.length > 0 && showAutocomplete == true" v-bind:class="{ 'd-block': showAutocomplete }">
                    <h6 class="dropdown-header">Results:</h6>
                    <a v-for="result in results" :key="result.id" class="dropdown-item" href="#" v-on:click="setNewValue(result)"><strong>{{ result.name }}</strong> from {{ result.location }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary font-weight-bold" href="#">Create a new profile?</a>
                </div>            
            </div>
        </div>

        <form method="POST" action="/profile/link">
            <slot>
                <!-- CSRF gets injected using Blade Formatting-->
            </slot>
            <!-- Hidden Fields -->
            <div class="form-group" hidden>
                <input type="text" name="id" v-model="link_userid">
                <input type="text" name="username" v-model="link_username">
            </div>

            <!-- Buttons -->
            <button class="btn btn-primary" type="submit" :disabled="keywords  == null || keywords == ''" >Connect</button>
            <button class="btn btn-success" type="button" >Create New Profile</button>
        </form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: [],
            showAutocomplete: false
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
        onTyping() {
            this.showAutocomplete = true;
        },
        setNewValue: function (person) {          
            this.keywords = person.name;
            this.showAutocomplete = false;

            this.link_userid = person.id;
            this.link_username = person.name;
        },
        clearSearch: function() {
            this.keywords = null;
            this.link_userid = null;
            this.link_username = null;
        }
    }
}
</script>