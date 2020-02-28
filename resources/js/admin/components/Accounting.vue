<template>
    <div class="row">
        <div class="form-group">
            <input type="hidden" :name="`accountings[${index}][id]`" :value="accounting.id">
        </div>
        <div class="form-group col-6">
            <label :for="`date[${index}]`">Дата</label>
            <input type="date" :id="`date[${index}]`" class="form-control"
                   :name="`accountings[${index}][date]`"
                   v-model="accounting.date" required>
        </div>
        <div class="form-group col-6">
            <label :for="`status[${index}]`">Статус</label>
            <input type="text" class="form-control"
                   :id="`status[${index}]`"
                   :name="`accountings[${index}][status]`"
                   v-model="accounting.status" >
        </div>
        <div class="form-group col-4">
            <label :for="`supplier[${index}]`">Поставщик</label>
            <input type="text" class="form-control"  :id="`supplier[${index}]`"
                   :name="`accountings[${index}][supplier]`"
                   v-model="accounting.supplier">
        </div>
        <div class="form-group col-4">
            <label :for="`price[${index}]`">Стоимость</label>
            <input type="number" class="form-control" min="0" :id="`price[${index}]`"
                   :name="`accountings[${index}][price]`"
                   v-model.number="accounting.price">
        </div>
        <div class="form-group col-4">
            <label :for="`whom[${index}]`">Чье</label>
            <input type="text" class="form-control" :id="`whom[${index}]`"
                   :name="`accountings[${index}][whom]`"
                   v-model="accounting.whom">
        </div>
        <div class="form-group col-12">
            <label :for="`message[${index}]`">Комментарий</label>
            <input type="text" class="form-control" :id="`message[${index}]`"
                   :name="`accountings[${index}][message]`"
                   v-model="accounting.message">
        </div>
        <div class="mb-4 ml-3">
            <button class="btn btn-primary" @click.prevent="removeAccounting">X</button>
        </div>
    </div>
</template>

<script>
  export default {
    props: {
      accounting: Object,
      index: Number,
    },

    methods: {
      removeAccounting() {
        if (this.accounting.id) {
          axios.delete('/admin/accounting/' + this.accounting.id);
        }

        this.$emit('removeAccounting');
      },
    }
  }
</script>
