<template>
  <div>
    <h2>Channels with Users</h2>
    <ul>
      <li
        v-for="({ id: channel_id, name, users }, index) in channelsWithUsers"
        :key="index"
      >
        id: {{ channel_id }} - name: {{ name }}
        <ul v-if="users">
          <li v-for="({ id: user_id, name }, index) in users" :key="index">
            {{ name }}
            <button @click.prevent="deleteUser(channel_id, user_id)">
              Remove
            </button>
          </li>
        </ul>
      </li>
    </ul>
    <hr />
    <div>
      <form>
        <div>
          <select name="" id="" v-model="user_id">
            <option
              :value="id"
              v-for="({ name, id }, index) in users"
              :key="index"
              >{{ name }}</option
            >
          </select>
        </div>
        <div>
          <select name="" id="" v-model="channel_id">
            <option
              :value="id"
              v-for="({ name, id }, index) in channels"
              :key="index"
              >{{ name }}</option
            >
          </select>
          <button @click.prevent="saveUser">Add</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Channels",
  data() {
    return {
      channelsWithUsers: null,
      users: null,
      channels: null,
      user_id: null,
      channel_id: null
    };
  },
  mounted() {
    this.getChannelsAndUsers();
    this.getUsers();
    this.getChannels();
  },
  methods: {
    getChannelsAndUsers() {
      axios.get("http://localhost:8000/api/channels-users").then(res => {
        this.channelsWithUsers = res.data;
      });
    },
    getUsers() {
      axios.get("http://localhost:8000/api/users").then(res => {
        this.users = res.data;
      });
    },
    getChannels() {
      axios.get("http://localhost:8000/api/channels").then(res => {
        this.channels = res.data;
      });
    },

    saveUser() {
      axios
        .post("http://localhost:8000/api/addUserToChannel", {
          data: { user_id: this.user_id, channel_id: this.channel_id }
        })
        .then(res => {
          console.log(res);
          this.getChannelsAndUsers();
        });
    },
    deleteUser(channel_id, user_id) {
      this.channel_id = channel_id;
      this.user_id = user_id;

      axios
        .post("http://localhost:8000/api/removeUserFromChannel", {
          data: { user_id: this.user_id, channel_id: this.channel_id }
        })
        .then(res => {
          console.log(res);
          this.getChannelsAndUsers();
        });
    }
  }
};
</script>

<style>
</style>
