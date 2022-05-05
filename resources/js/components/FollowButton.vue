<template>
  <div>
    <button
      class="btn btn-primary btn-sm"
      style="margin-left: 15px; padding: 5px 10px"
      @click="followUser"
      v-text="buttonText"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function () {
    // console.log("follows value" + this.follows);
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;

          console.log(response.data);
          // console.log("sample" + this.status);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },

  computed: {
    buttonText() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
