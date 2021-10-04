<?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][1]['permissions']['read']) ): ?>
<v-col cols="12">
    <h2 class="grey--text text--darken-1">Materiales</h2>
</v-col>
<v-col cols="12">
    <v-dialog v-model="materials_sent.dialog" max-width="600px">
        <v-card>
            <v-toolbar class="mp-select-toolbar" elevation="0">
                <v-toolbar-title>{{ materials_sent.editedItem.material_name }}</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn icon dark @click="materials_sent.dialog = false">
                        <v-icon color="grey">mdi-close</v-icon>
                    </v-btn>
                </v-toolbar-items>
            </v-toolbar>

            <v-card-text>
                <v-container fluid>
                    <v-row>
                        <v-col cols="12">
                            <v-data-table class="elevation-1" :headers="materials_sent.headers"
                                :items="materials_sent.items" :search="materials_sent.search" sort-by="registered_at"
                                item-key="material_id" :loading="materials_sent.loading" sort-desc>
                                <template #top>
                                    <v-col cols="12">
                                        <v-text-field class="mx-4 v-normal-input" label="Buscar"
                                            v-model="materials_sent.search" append-icon="mdi-magnify" clearable outlined
                                            single-line hide-details></v-text-field>
                                    </v-col>
                                </template>
                                <template #no-data>
                                    No se encontraron registros
                                </template>
                            </v-data-table>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>
        </v-card>
    </v-dialog>
    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][1]['permissions']['create']) ): ?>
    <v-dialog v-model="templates.create_dialog" max-width="600px" @click:outside="closeCreateMaterialDialog">
        <v-card>
            <v-toolbar class="mp-select-toolbar" elevation="0">
                <v-toolbar-title>Añadir nueva plantilla</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn icon dark @click="closeCreateMaterialDialog">
                        <v-icon color="grey">mdi-close</v-icon>
                    </v-btn>
                </v-toolbar-items>
            </v-toolbar>
            <v-card-text>
                <v-form ref="material_template_form" v-model="templates.create_form_valid" lazy-validation>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field v-model="templates.editedItem.material_name" label="Nombre del material"
                                :rules="templates.rules.nameRules" outlined required>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-file-input v-model="templates.editedItem.source" prepend-icon=""
                                :rules="templates.rules.fileRules" show-size outlined>
                            </v-file-input>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn color="primary" @click="saveMaterialTemplate" :loading="templates.create_loading"
                    :disabled="!templates.create_form_valid" block>
                    Crear
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <?php endif ?>
    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][1]['permissions']['delete']) ): ?>
    <v-dialog v-model="templates.delete_dialog" max-width="700px" @click:outside="closeCreateMaterialDialog">
        <v-card>
            <v-card-title class="headline">Estás seguro de que quieres eliminar este material?
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeCreateMaterialDialog">Cancelar
                </v-btn>
                <v-btn color="blue darken-1" text @click="deleteMaterialItemConfirm">Continuar
                </v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <?php endif ?>
    <v-data-table v-model="template_selected" class="elevation-1" :headers="templates.headers" :items="templates.items"
        :search="templates.search" sort-by="registered_at" item-key="material_id" :loading="templates.list_loading"
        show-select sort-desc>
        
        <template #top>
            <v-row>
                <v-col cols="6" lg="10" md="9">
                    <v-text-field class="mx-4 v-normal-input" label="Buscar material" v-model="templates.search"
                        append-icon="mdi-magnify" clearable outlined single-line hide-details></v-text-field>
                </v-col>
                <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][1]['permissions']['create']) ): ?>
                <v-col class="d-flex justify-center align-center" cols="6" lg="2" md="3">
                    <v-btn color="primary" @click="showCreateMaterialDialog">
                        <v-icon>mdi-plus</v-icon>
                        Añadir
                    </v-btn>
                </v-col>
                <?php endif ?>
            </v-row>
        </template>
        <template #item.actions="{ item }">
            <v-row class="ml-n7" justify="center" align="center">
                <v-icon md color="primary" @click="showMaterialsSent(item)">
                    mdi-eye
                </v-icon>
                <template v-if="item.type == 'C'">
                    <v-btn color="info" :href="item.source" :download="item.material_name" icon text>
                        <v-icon md>
                            mdi-download
                        </v-icon>
                    </v-btn>
                    <?php if (!empty($can_manage_suite) || !empty($access['patient_material_access']['sections'][1]['permissions']['delete']) ): ?>
                    <v-icon md color="error" @click="deleteMaterialItem(item)">
                        mdi-trash-can
                    </v-icon>
                    <?php endif ?>
                </template>
                <template v-else-if="item.type == 'S'">
                    <v-btn color="info" @click="downloadMaterialExample(item)" icon text>
                        <v-icon md>
                            mdi-download
                        </v-icon>
                    </v-btn>
                </template>
            </v-row>
        </template>
        <template #no-data>
            <v-btn color="primary" @click="initialize">
                Recargar
            </v-btn>
        </template>
    </v-data-table>
</v-col>
<?php endif ?>
