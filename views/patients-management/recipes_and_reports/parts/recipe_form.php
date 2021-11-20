<v-form>
    <v-container fluid>
        <v-row>
            <v-col cols="6" md="6">
                <label>Fecha de la consulta</label>
                <v-dialog ref="recipe_appointment_date_dialog" v-model="recipes.date_modal"
                    :return-value.sync="recipes.editedItem.appointment_date" width="290px">
                    <template #activator="{ on, attrs }">
                        <v-text-field class="mt-3" v-model="recipes.editedItem.appointment_date" readonly v-bind="attrs"
                            v-on="on" outlined>
                            <template #append>
                                <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                            </template>
                        </v-text-field>
                    </template>
                    <v-date-picker v-model="recipes.editedItem.appointment_date" locale="es" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="recipes.date_modal = false">
                            Cancelar
                        </v-btn>
                        <v-btn text color="primary"
                            @click="$refs.recipe_appointment_date_dialog.save(recipes.editedItem.appointment_date)">
                            OK
                        </v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <v-col cols="6" md="6">
                <label>Próxima cita</label>
                <v-dialog ref="recipe_next_next_appointment_dialog" v-model="recipes.next_date_modal"
                    :return-value.sync="recipes.editedItem.next_appointment" width="290px">
                    <template #activator="{ on, attrs }">
                        <v-text-field class="mt-3" v-model="recipes.editedItem.next_appointment" readonly v-bind="attrs"
                            v-on="on" outlined>
                            <template #append>
                                <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                            </template>
                        </v-text-field>
                    </template>
                    <v-date-picker v-model="recipes.editedItem.next_appointment" locale="es" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="recipes.next_date_modal = false">
                            Cancelar
                        </v-btn>
                        <v-btn text color="primary"
                            @click="$refs.recipe_next_next_appointment_dialog.save(recipes.editedItem.next_appointment)">
                            OK
                        </v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <v-col cols="12">
                <v-data-table :headers="recipes.diagnostic_headers" :items="recipes.editedItem.diagnostics"
                    class="elevation-1">
                    <template #top>
                        <v-col class="d-flex justify-end mb-n6" cols="12">
                            <v-btn color="secondary" dark rounded class="mb-2"
                                @click="recipes.editedItem.diagnostics.push({diagnostic: '', treatment_goal: ''})">
                                <v-icon>mdi-plus</v-icon>
                                Añadir
                            </v-btn>
                        </v-col>
                    </template>
                    <template #item.diagnostic="props">
                        <v-text-field class="mt-4" v-model="props.item.diagnostic" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.treatment_goal="props">
                        <v-textarea class="mt-4" v-model="props.item.treatment_goal" placeholder="Redacte acá..."
                            rows="1" outlined dense auto-grow></v-textarea>
                    </template>
                    <template #item.action="{item, i}">
                        <v-icon color="error" class="mt-n2" @click="recipes.editedItem.diagnostics.splice(i, 1)">
                            mdi-close</v-icon>
                    </template>
                </v-data-table>
            </v-col>
            <v-col cols="12">
                <v-data-table :headers="recipes.instruction_headers" :items="recipes.editedItem.instructions"
                    class="elevation-1">
                    <template #top>
                        <v-col class="d-flex justify-end mb-n6" cols="12">
                            <v-btn color="secondary" dark rounded class="mb-2"
                                @click="recipes.editedItem.instructions.push({treatment: '', dosis: '', schedule: '', observations: '',})">
                                <v-icon>mdi-plus</v-icon>
                                Añadir
                            </v-btn>
                        </v-col>
                    </template>
                    <template #item.treatment="props">
                        <v-text-field class="mt-4" v-model="props.item.treatment" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.dosis="props">
                        <v-text-field class="mt-4" v-model="props.item.dosis" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.schedule="props">
                        <v-text-field class="mt-4" v-model="props.item.schedule" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.observations="props">
                        <v-textarea class="mt-4" v-model="props.item.observations" placeholder="Redacte acá..." rows="1"
                            outlined dense auto-grow></v-textarea>
                    </template>
                    <template #item.action="{item, i}">
                        <v-icon class="mt-n2" color="error" @click="recipes.editedItem.instructions.splice(i, 1)">
                            mdi-close</v-icon>
                    </template>
                </v-data-table>
            </v-col>
            <v-col cols="12">
                <label>Comentarios adicionales</label>
                <v-textarea class="mt-3" v-model="recipes.editedItem.comments" rows="1" auto-grow outlined dense>
                </v-textarea>
            </v-col>
        </v-row>
    </v-container>
</v-form>