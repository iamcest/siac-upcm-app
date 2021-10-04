<?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][0]['permissions']['read']) ): ?>
<v-row>
    <v-col cols="12" md="12">
        <h2 class="grey--text text--darken-1">Materiales para el
            paciente{{ isSelected ? ': ' + patient.full_name : '' }}</h2>
    </v-col>

</v-row>
<v-row class="mt-6" v-if="!isSelected">
    <v-col cols="12">
        <v-form @submit.prevent>
            <v-row>
                <v-col cols="12">
                    <v-text-field v-model="search" label="Buscar el paciente" hint="Ingrese el nombre del paciente"
                        @keyup.enter.prevent="searched = true" outlined>
                        <template #append-outer>
                            <v-btn class="primary white--text py-7 ml-n3 submit-button" v-on:click="searched = true">
                                <v-icon large>mdi-magnify</v-icon>
                            </v-btn>
                        </template>
                    </v-text-field>
                </v-col>
                <v-col cols="12" v-if="searched">
                    <v-select class="mt-3" v-model="patient" label="Seleccione el paciente" :items="searchPatient"
                        item-text="full_name" item-value="id" v-on:change="isSelected = true" return-object outlined>
                    </v-select>
                </v-col>
            </v-row>
        </v-form>
    </v-col>
</v-row>
<v-row v-if="isSelected">
    <v-col cols="12">
        <v-data-table class="elevation-1" :headers="headers" :items="patients_material" sort-by="registered_at"
            sort-desc>
            <template #top>
                <v-toolbar flat>
                    <v-spacer></v-spacer>
                    <v-btn color="secondary" dark rounded class="mb-2 mr-5" v-on:click="resetSearch">
                        <v-icon>mdi-magnify</v-icon>
                        Buscar otro paciente
                    </v-btn>
                    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][0]['permissions']['create']) ) : ?>
                        <v-dialog v-model="dialog" max-width="50%">
                            <template #activator="{ on, attrs }">
                                <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                                    <v-icon>mdi-plus</v-icon>
                                    Enviar material
                                </v-btn>
                            </template>
                            <v-card>
                                <v-toolbar class="mp-select-toolbar" elevation="0">
                                    <h4 class="text-h4 text-center grey--text text--darken-1 font-weight-medium">¿Cómo le
                                        gustaría añadir el material para el paciente?</h4>
                                    <v-spacer></v-spacer>
                                    <v-toolbar-items>
                                        <v-btn icon dark @click="dialog = false">
                                            <v-icon color="grey">mdi-close</v-icon>
                                        </v-btn>
                                    </v-toolbar-items>
                                </v-toolbar>

                                <v-card-text>
                                    <v-container fluid>

                                        <v-row>
                                            <!---INSERT FORM HERE-->
                                            <v-col class="d-flex justify-center" cols="12">
                                                <v-radio-group v-model="editedItem.material_type" row>
                                                    <v-radio label="Plantilla seleccionada" value="template"></v-radio>
                                                    <v-radio label="Material personalizado" value="custom material">
                                                    </v-radio>
                                                    <v-radio label="Subir archivo" value="file upload"></v-radio>
                                                </v-radio-group>
                                            </v-col>
                                        </v-row>

                                    </v-container>
                                </v-card-text>
                                <v-card-actions class="px-6">
                                    <v-spacer></v-spacer>
                                    <v-btn color="secondary white--text text-capitalize" block
                                        @click="materialFormDialog = true; dialog = false">
                                        Continuar
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="materialFormDialog" max-width="90%">
                            <v-card>
                                <v-toolbar class="mp-select-toolbar" elevation="0">
                                    <v-toolbar-title>Añadir material para el paciente: {{ patient.full_name }}
                                    </v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-toolbar-items>
                                        <v-btn icon dark @click="materialFormDialog = false">
                                            <v-icon color="grey">mdi-close</v-icon>
                                        </v-btn>
                                    </v-toolbar-items>
                                </v-toolbar>

                                <v-card-text>
                                    <v-container fluid>

                                        <v-row>
                                            <!---INSERT FORM HERE-->
                                            <v-col cols="12">
                                                <label class="black--text">Asunto</label>
                                                <v-text-field class="mt-3" v-model="editedItem.title" outlined clearable>
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" v-if="editedItem.material_type == 'file upload'">
                                                <label class="black--text">Archivo del material a enviar</label>
                                                <v-file-input v-model="editedItem.file" prepend-icon="" show-size outlined>
                                                </v-file-input>
                                            </v-col>
                                            <v-col cols="12" v-if="editedItem.material_type == 'custom material'">
                                                <label class="black--text">Contenido del material</label>
                                                <vue-editor id="editor1" class="mt-3" v-model="editedItem.content"
                                                    placeholder="Contenido del material que será enviado al paciente"
                                                    clearable />
                                            </v-col>
                                            <v-col cols="12" v-if="editedItem.material_type == 'template'">
                                                <template v-if="template_selected.length > 0">
                                                    <label class="font-weight-bold black--text">Material seleccionado:
                                                    </label>
                                                    <ul>
                                                        <li v-for="template in template_selected">
                                                            {{ template.material_name }}
                                                        </li>
                                                    </ul>
                                                </template>
                                                <template v-else>
                                                    <label class="font-weight-bold black--text">Material seleccionado: Debe
                                                        seleccionar primero una plantilla</span>
                                                    </label>
                                                </template>
                                            </v-col>
                                            <v-col cols="12">
                                                <label class="black--text">Contenido del mensaje (Opcional)</label>
                                                <vue-editor id="editor2" class="mt-3" v-model="editedItem.message"
                                                    placeholder="Contenido del mensaje a ser enviado en el correo"
                                                    clearable />
                                            </v-col>
                                        </v-row>

                                    </v-container>
                                </v-card-text>
                                <v-card-actions class="px-6">
                                    <v-spacer></v-spacer>
                                    <v-btn color="secondary white--text text-capitalize" block @click="save"
                                        :loading="material_loading">
                                        Enviar
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    <?php endif ?>
                    <v-dialog v-model="viewDialog" max-width="70%" @click:outside="closeViewDialog">
                        <v-card>
                            <v-toolbar class="mp-select-toolbar" elevation="0">
                                <v-toolbar-title>{{ editedItem.title }}</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn icon dark @click="closeViewDialog">
                                        <v-icon color="grey">mdi-close</v-icon>
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>

                            <v-card-text>
                                <v-container fluid>

                                    <v-row>
                                        <!---INSERT FORM HERE-->
                                        <v-col cols="12">
                                            <h4 class="black--text">Asunto</h4>
                                            <br>
                                            {{ editedItem.title }}
                                        </v-col>
                                        <v-col cols="12" v-if="editedItem.message != ''">
                                            <h4 class="black--text">Contenido del mensaje</h4>
                                            <br>
                                            <div class="ql-editor" v-html="editedItem.message" style="min-height: 100%;">

                                            </div>
                                        </v-col>
                                        <v-col cols="12" md="4" lg="3" v-for="file in editedItem.files">
                                            <v-card class="mx-auto" outlined>
                                                <v-list-item three-line>
                                                    <v-list-item-content class="text-center">
                                                        <v-list-item-title class="text-h5 mb-1">
                                                            <template v-if="file.material_type == 'template'">
                                                                {{ file.material_name }}
                                                            </template>
                                                            <template v-else>
                                                                Archivo enviado
                                                            </template>
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>

                                                <v-card-actions>
                                                    <v-btn color="primary" :href="file.file_name" download block outlined rounded text>
                                                        Descargar
                                                    </v-btn>
                                                </v-card-actions>
                                            </v-card>
                                        </v-col>
                                    </v-row>

                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][0]['permissions']['delete']) ) : ?>
                        <v-dialog v-model="dialogDelete" max-width="1200px">
                            <v-card>
                                <v-card-title class="headline">Estás seguro de que quieres eliminar este material?
                                </v-card-title>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    <?php endif ?>
                </v-toolbar>
            </template>
            <template #item.actions="{ item }">
                <v-row justify="center" align="center">
                    <v-icon md class="" @click="showItem(item)" color="primary">
                        mdi-eye
                    </v-icon>
                    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][0]['permissions']['delete']) ) : ?>
                    <v-icon md @click="deleteItem(item)" color="#F44336">
                        mdi-delete
                    </v-icon>
                    <?php endif ?>
                </v-row>

            </template>
            <template #no-data>
                <v-btn color="primary" @click="initialize">
                    Recargar
                </v-btn>
            </template>
        </v-data-table>
    </v-col>
</v-row>
<?php endif ?>