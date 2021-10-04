
                                  <v-col class="full-width px-0" id="vital_signs" cols="12">
                                      <v-row>
                                        <v-col class="font-weight-bold text-center" cols="8" offset="2">
                                          <v-row>
                                            <v-col cols="1"></v-col>
                                            <v-col cols="5">
                                              <label for="">Temperatura
                                                <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                  <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.percent)) + '%)'">
                                                  </v-badge>
                                                </template>
                                              </label>
                                              <v-text-field class="mt-3" v-model="patient_vital_signs.temperature" type="number" suffix="°C" outlined dense>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="5">
                                              <label for="">SAT
                                                <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                  <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.percent)) + '%)'">
                                                  </v-badge>
                                                </template>
                                              </label>
                                              <v-text-field class="mt-3" v-model="patient_vital_signs.sat" type="number" suffix="%" outlined dense></v-text-field>
                                            </v-col>
                                          </v-row>
                                        </v-col>
                                      </v-row>
                                      <v-row v-for="(item, index) in 3">
                                        <v-col cols="12" md="12">
                                          <h2 class="text-center">
                                            <template v-if="index == 0">
                                              Sentado
                                            </template>
                                            <template v-if="index == 1">
                                              Acostado
                                            </template>
                                            <template v-if="index == 2">
                                              De pie
                                            </template>
                                          </h2>
                                        </v-col>
                                        <v-col class="mb-n12" cols="12">
                                          <v-row class="d-flex justify-center">
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="12">
                                                  <label for="">Frecuencia respiratoria
                                                    <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                      <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.percent)) + '%)'">
                                                      </v-badge>
                                                    </template>
                                                  </label>
                                                  <v-text-field class="mt-3" v-model="patient_vital_signs.takes[index]['breathing_rate']" type="number" suffix="rpm" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="12">
                                                  <label for="">Frecuencia Cardíaca
                                                    <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                      <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.percent)) + '%)'">
                                                      </v-badge>
                                                    </template>
                                                  </label>
                                                  <v-text-field class="mt-3" v-model="patient_vital_signs.takes[index]['frc']" type="number" suffix="lat x min" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                        </v-col>
                                        <v-col cols="12">
                                          <v-row class="d-flex align-center justify-center">
                                            <v-col cols="12" md="8">
                                              <v-row>
                                                <v-col class="font-weight-bold text-center" cols="12" md="6">
                                                  PA brazo derecho *
                                                </v-col>
                                                <v-col class="font-weight-bold text-center" cols="12" md="6">
                                                  PA brazo izquierdo *
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center justify-center">
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][0]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm1'],
                                                  ], index, 'pa_right_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][0]['pa_right_arm2']" v-model="patient_vital_signs.takes[index][2]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm2'],
                                                  ], index, 'pa_right_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][0]['pa_left_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm1'],
                                                  ], index, 'pa_left_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][0]['pa_left_arm2']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm2'],
                                                  ], index, 'pa_left_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center mt-n-10 justify-center">
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][1]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm1'],
                                                  ], index, 'pa_right_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][1]['pa_right_arm2']" v-model="patient_vital_signs.takes[index][2]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm2'],
                                                  ], index, 'pa_right_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][1]['pa_left_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm1'],
                                                  ], index, 'pa_left_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][1]['pa_left_arm2']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm2'],
                                                  ], index, 'pa_left_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center pt-0 mt-0 justify-center">
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][2]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm1'],
                                                  ], index, 'pa_right_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][2]['pa_right_arm2']" v-model="patient_vital_signs.takes[index][2]['pa_right_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_right_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_right_arm2'],
                                                  ], index, 'pa_right_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row>
                                                <v-col cols="5">
                                                  <v-text-field label="PAS" v-model="patient_vital_signs.takes[index][2]['pa_left_arm1']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm1'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm1'],
                                                  ], index, 'pa_left_arm1_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <v-text-field label="PAD" v-model="patient_vital_signs.takes[index][2]['pa_left_arm2']" @input="getAverage(
                                                  [
                                                    patient_vital_signs.takes[index][0]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][1]['pa_left_arm2'],
                                                    patient_vital_signs.takes[index][2]['pa_left_arm2'],
                                                  ], index, 'pa_left_arm2_average')" suffix="mmHg" outlined dense></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col cols="12" v-if="1 == 2">* Luego de 5 minutos sentado el paciente</v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center pt-0 mt-n10 justify-center">
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row v-bind:class="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1 ? 'd-flex align-center' : ''">
                                                <v-col cols="5">
                                                  <label>
                                                    <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                      <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.percent)) + '%)'">
                                                      </v-badge>
                                                    </template>
                                                  </label>
                                                  <v-text-field label="Promedio PAS" v-model="patient_vital_signs.takes[index]['pa_right_arm1_average']" suffix="mmHg" outlined dense disabled></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <label>
                                                    <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                      <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.percent)) + '%)'">
                                                      </v-badge>
                                                    </template>
                                                  </label>
                                                  <v-text-field label="Promedio PAD" v-model="patient_vital_signs.takes[index]['pa_right_arm2_average']" suffix="mmHg" outlined dense disabled></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="4">
                                              <v-row v-bind:class="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1 ? 'd-flex align-center' : ''">
                                                <v-col cols="5">
                                                  <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                    <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.percent)) + '%)'">
                                                    </v-badge>
                                                  </template>
                                                  <v-text-field label="Promedio PAS" v-model="patient_vital_signs.takes[index]['pa_left_arm1_average']" suffix="mmHg" outlined dense disabled></v-text-field>
                                                </v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5">
                                                  <template v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                                    <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.percent)) + '%)'">
                                                    </v-badge>
                                                  </template>
                                                  <v-text-field label="Promedio PAD" v-model="patient_vital_signs.takes[index]['pa_left_arm2_average']" suffix="mmHg" outlined dense disabled></v-text-field>
                                                </v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col cols="12" v-if="1 == 2">* Luego de 5 minutos sentado el paciente</v-col>
                                          </v-row>
                                        </v-col>
                                        <v-col cols="12">
                                          <v-divider></v-divider>
                                        </v-col>
                                      </v-row>
                                      <v-row>

                                        <?php echo new Template('patients-management/view_tabs/vital_signs_parts/results') ?>

                                      </v-row>
                                      <v-row>

                                        <v-col cols="12">
                                          <v-btn color="primary white--text" block @click="tab = 'tab-6';initializePhysicalExams();initializePlans()">
                                            Ir a siguiente pestaña
                                          </v-btn>
                                          <v-btn color="secondary white--text" block @click="calcVitalSigns">
                                            Guardar
                                          </v-btn>
                                        </v-col>

                                      </v-row>
                                  </v-col>
