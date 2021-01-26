<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-card>
        <v-card-title class="headline">
          Welcome to the "Check Login of your WP"
        </v-card-title>
        <v-card-text>
          <div v-if="token">
            <p>Your logged ID is : 
            <span>{{userId}}</span>
            </p>
          </div>
          <div v-else>
            <p>You are not logged in yet.</p>
          </div>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>
<script>

export default {
  components: {
  },
  data() {
    return {
      token : '',
      userId: ''
    }
  },
  async fetch() {
    this.token = this.$route.query.cookie;
    const data= {
      token: this.token
    }
    let res = await this.$axios.$post(`wp-json/tms/v1/auth/login`, data)
    this.userId = res
  }
}
</script>
