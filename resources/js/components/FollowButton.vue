<template>
  <div>
    <button
      class="btn btn-primary btn-sm"
      style="margin-left: 15px; padding: 5px 10px"
      @click="followUser"
    >
      Follow
    </button>
  </div>
</template>

<script>
export default {
  props: ["userId"],

  mounted() {
    console.log("Component mounted.");
  },

  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          alert(response.data);
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
