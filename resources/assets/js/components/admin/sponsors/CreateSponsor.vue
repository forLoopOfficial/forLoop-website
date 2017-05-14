<template>
    <modal :show="true" :title="title" transition="zoom" @ok="ok" @cancel="cancel">
      <div class="content has-text-centered">
        <img :src="src" height="120" alt="Vue Admin">
      </div>
    </modal>
</template>

<script>
import { Modal } from '../Modal.vue'

export default {
  name: 'CreateSponsor',
  props: [
    'show'
  ],
  components: {
    Modal
  },
  methods: {
    ok () {

    },
    cancel () {

    }
  }
}
</script>
