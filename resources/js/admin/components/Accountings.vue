<template>
    <div class="mt-6">
        <accounting
                v-for="(account, index) in accountings"
                :accounting="account"
                :index="index"
                :key="account.hash"
                @removeAccounting="removeAccounting(index)"/>

        <button class="btn btn-outline-primary" @click.prevent="addAccounting">
            Добавить статью расходов
        </button>

    </div>
</template>

<script>
  import Accounting from './Accounting'
  import {accounting} from "../shared/constants";

  export default {
    data() {
      return {
        accountings: [...this.data],
      }
    },

    components: {
      Accounting
    },

    props: {
      data: Array
    },

    methods: {
      addAccounting() {
        const v = Object.assign({}, accounting);
        v.hash = new Date().getTime();
        this.accountings.push(v);
      },

      removeAccounting(index) {
        this.accountings.splice(index, 1);
      }
    },
  }
</script>
