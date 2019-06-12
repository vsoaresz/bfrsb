<template>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <div class="form-group">
                    <label for="name">Código Turma</label>
                    <the-mask :mask="['###']" class="form-control" masked v-model="turma.name" autofocus />
                    <small class="float-right">Apenas números</small>

                </div>

                <div class="form-group mt-4">
                    <button @click="saveClass" type="button" class="btn btn-primary btn-block mr-3">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {TheMask} from 'vue-the-mask'
import Swal from 'sweetalert2'

export default {

  components: {TheMask},

  data () {
    return {
      turma: {
        name: ''
      }
    }
  },

  methods: {
    saveClass () {
      axios({
        method: 'POST',
        url: '/class/create',
        data: this.turma
      }).then((result) => {
        Swal.fire('', 'Turma cadastrada com sucesso!', 'success')
        this.resetForm()
      }).catch((error) => {
        let errors = _.get(error, 'response.data.errors', false)

        if(errors) {
          Swal.fire('', _.toArray(errors).join('<br>'), 'error')
        } else {
          Swal.fire('', 'Erro ao criar a turma, preencha todos os campos!', 'error')
        }
      })
    },
    resetForm () {
      this.turma = {name: ''}
    },
  }
}
</script>

