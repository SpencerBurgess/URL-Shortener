<template>
    <form @submit.prevent="submit">
        <div class="input-group">
            <input type="url" class="form-control" name="url" id="url" v-model="fields.url" placeholder="https://www.example.com/test/" />
            <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Shorten</button>
            </span>
        </div>
        <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
        <div v-if="success" class="alert alert-success mt-3">
            <h2 class="text-center">{{shorturl}}</h2>
        </div>
    </form>
    
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
    }
  },
    methods: {
        submit() {
          if (this.loaded) {
            this.loaded = false;
            this.success = false;
            this.errors = {};
            axios.post('/submit', this.fields).then(response => {
              this.fields = {}; //Clear input fields.
              this.loaded = true;
              this.success = true;
              this.shorturl = response.data;
            }).catch(error => {
              this.loaded = true;
              if (error.response.status === 422) {
                this.errors = error.response.data.errors || {};
              }
            });
          }
        },
      },
    }
</script>
