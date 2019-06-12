<template>
    <div class="row">
        <div class="col-8 offset-2 ">
          <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nome do Professor</label>
                    <input type="text" name="nome" class="form-control" v-model="teacher.name" autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="course">Disciplina</label>
                    <select id="course" class="form-control" v-model="teacher.course">
                        <option value="" disabled="" selected="">Selecione a disciplina...</option>
                        <option value="Química">Química</option>
                        <option value="História">História</option>
                        <option value="Português">Português</option>
                        <option value="Física">Física</option>
                        <option value="Algebra">Algebra</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div>Horários</div>
                <div v-for="(schedule, i) in teacher.schedules" :key="i">
                    <div class="form-row">
                        <div class="form-group col-2">
                            <button class="btn btn-sm btn-danger btn-block" @click="removeSchedule(i)"
                                title="Remover Horário" :disabled="teacher.schedules.length < 2">Remover
                                horário</button>
                        </div>
                        <div class="form-group col-4">
                            <div class="form-check form-check-inline" v-for="(weekday, w) in weekdays" :key="w">
                                <label>
                                    <input class="form-check-input" :name="`schedule-${i}`" type="radio"
                                        :value="weekday" v-model="schedule.weekday">
                                    {{ weekday }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <label>
                                Horário de início
                                <the-mask :mask="['##:##']" class="form-control" masked v-model="schedule.start_time" />
                            </label>
                        </div>
                        <div class="form-group col-3">
                            <label>
                                Horário de término
                                <the-mask :mask="['##:##']" class="form-control" masked v-model="schedule.end_time" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-2">
                        <button class="btn btn-success btn-block" @click="addSchedule"> <i class="icon-plus"></i>
                            Adicionar horário
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <button @click="saveTeacher" type="button" class="btn btn-primary mr-3">Cadastrar</button>
            </div>
        </div>
        </div>
    </div>
</template>

<script>

import {TheMask} from 'vue-the-mask'
import Swal from 'sweetalert2'

const defaultSchedule = {
  weekday: '',
  start_time: '',
  end_time: ''
}

const defaultTeacher = {
  name: '',
  course: '',
  schedules: [
    _.cloneDeep(defaultSchedule)
  ]
}

export default {
  name: 'TeacherCreate',

  components: {TheMask},

  data () {
    return {
      errors: {},
      weekdays: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
      teacher: _.cloneDeep(defaultTeacher)
    }
  },

  methods: {
    addSchedule () {
      this.teacher.schedules.push(_.cloneDeep(defaultSchedule))
    },

    removeSchedule(i) {
      this.teacher.schedules.splice(i, 1)
    },

    resetForm () {
      this.teacher = _.cloneDeep(defaultTeacher)
    },

    saveTeacher() {
      axios({
        method: 'POST',
        url: '/teacher/create',
        data: this.teacher
      }).then((result) => {
        Swal.fire('', 'Professor cadastrado com sucesso!', 'success')
        this.resetForm()
      }).catch((error) => {
        let errors = _.get(error, 'response.data.errors', false)

        if(errors) {
          Swal.fire('', _.toArray(errors).join('<br>'), 'error')
        } else {
          Swal.fire('', 'Erro ao criar professor, preencha todos os campos!', 'error')
        }
      })
    }
  }
}
</script>